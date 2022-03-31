<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
		// function __construct() {
		// 	parent::__construct();
		// 	$method=  $this->router->fetch_method();
		// 	$allowed=array('index');
		// 	if(!in_array($method,$allowed)){
		// 		$this->login_check();
		// 	}
		// }

	public function login_check(){
		if (!$this->session->userdata('user_id')) {
			return redirect(base_url('/Home'));
		}else{
			$is_user_login = 1;
			$user_id = $this->session->userdata('user_id');
		}
	}

	public function index(){
		$this->load->view('home');
	}

	public function product_listing($place = Null, $place_id = Null, $product_category_name = Null){
		$place_name = str_replace("-"," ","$place");
		$place_data = $this->User_model->getplace($place_name);
		$place_id = $place_data[0]['id'];
		$product_category = $this->User_model->getProductCategory();
		$products = $this->User_model->productWithCategory($place_id);

		$data = array();
		foreach($products as $product){
			$data[$product['category_name']][] = $product;
		}
		$products = $data;
		$product_category = array_keys($products);
		$data['data'] = array($place_data, 'categories'=>$product_category, 'products'=>$products);
		$this->load->view('outlet/outlet', $data);
	}

	public function addToCart(){
		$items = $this->input->post('items');
		foreach($items as $id=>$details){
			$data = array();
			$data['product_id'] = $id;
			$data['product_name'] = $details['name'];
			$data['qty'] = $details['quantity'];
			$data['price'] = $details['price'] * $details['quantity'];
			$data['is_veg'] = $details['is_veg'];
			$this->session->set_userdata('cart',json_encode($data));
		}
		if (!empty($this->session->userdata('cart'))) {
			$message =  json_encode(array("statusCode"=>200));
		}else {
			$message = json_encode(array("statusCode"=>201));
		}
		echo $message;
	}
	
	private $product_payload_default_keys = ['id','qty','current_restaurant'];
	
	private $cart_key = 'cart';
	
	public function add_to_cart(){
	    
		$item = $this->input->post('item');
		
		$reset = $this->input->post('reset');
		
		
		
		$return = array(
		       'success'=>false
		       );
		       
		if($this->validateProductPayload($item)){
		    $product = $this->User_model->getSingleProduct($item['id']);
		    if($product && $product->place_id == $item['current_restaurant']['uniqueId']){
		        
		        $cart = $this->getCart();
		        if($reset == 'true'){
		            $cart = $this->resetCartItems();
		        }
		        
		        if(array_key_exists('current_restaurant',$cart) && $cart['current_restaurant']['uniqueId'] != $item['current_restaurant']['uniqueId']){
		           $cart =  $this->resetCartItems();
		        }
		        
		        
		        $oldItems = array_key_exists('items',$cart) ? $cart['items'] : [];
		        
		        $quantity = 0;
		        if(count($oldItems) > 0 && array_key_exists($item['id'],$oldItems)){
		            $quantity = $oldItems[$item['id']]['qty'];
		        }
		        $trigger = 'added';
		        $quantity += (int)$item['qty'];
		        if($quantity > 1){
		            $trigger = 'updated';
		        }else if($quantity <= 0){
		            $trigger = 'deleted';
		        }
		        
		        $data =array(
		            'id'=>(int)$product->id,
		            'name'=>$product->name,
		            'qty'=>$quantity,
		            'is_veg'=>$product->is_veg == 0 ? 'nonveg' : 'veg',
		            'price'=>$quantity*(int) $this->getProductPrice($product),
		            'current_restaurant'=>$item['current_restaurant'],
		        );
		            
		      $new_cart = $this->setCartItem($data,$oldItems);
		        $return = array(
		            'success'=>true,
		            'cart'=>$new_cart,
		            'trigger'=>$trigger
		        );
		    }
		}
		echo json_encode($return);
	}
	
	private function getProductPrice($product){
	    if(!$product){
	        return 0;
	    }
	    if($product->selling_price){
	        return $product->selling_price;
	    }
	    return $product->mrp;
	}
	
	
	private function resetCartItems(){
		$this->session->unset_userdata($this->cart_key);
		return [];
	}
	
	private function getCart($key = false){
	     $cart = $this->session->userdata($this->cart_key);
	     $cart = $cart ? json_decode($cart,true) : [];
	     $cart = $key && array_key_exists($key,$cart) ? $cart[$key] : $cart; 
	     return $cart;
	}
	
	private function getCartItems($product_id = false){
	     $items = $this->getCart('items');
	     $items = $product_id && array_key_exists($product_id,$items)? $items[$product_id]: $items ;
	     return $items;
	}
	
	private function getCartItem($product_id){
	     $items = $this->getCartItems($product_id);
	     return $item;
	}
	
	private function setCartItem($data,$oldItems = false){
	    if(!$oldItems){
	    $oldItems = $this->getCartItems();
	    }
	    if($data['qty'] <= 0){
	        unset($oldItems[$data['id']]);
	    }else{
	        $id = $data['id'];
	        unset($data['id']);
	        $oldItems[$id] = $data;
	    }
	    $update_data = $this->generateCartData($oldItems,$data['current_restaurant']);
		$this->session->set_userdata($this->cart_key,json_encode($update_data));
		return $update_data;
	}
	
	private function generateCartData ($items,$current_restaurant){
	    return array(
	        'items'=>$items,
	        'current_restaurant' => $current_restaurant
	        );
	}
	
	private function validateProductPayload($data){
	    $has_error = true;
	    foreach($this->product_payload_default_keys as $key){
	        if(!array_key_exists($key,$data)){
	            $has_error = false;
	            break;
	        }
	    }
	    return $has_error;
	}
	
	public function checkout(){
		if(count($this->getCartItems()) > 0){
			// $user_data = $this->Admin_model->users();
			$user_address = $this->User_model->userAddress($this->session->userdata('user_id'));
			$data['data'] = array(
			    'user_address' => $user_address,
			    'cart'=>$this->getCart()
			    );
			$this->load->view('checkout', $data);
		}else{
			return redirect('home');
		}
	}

	//User Details 

	public function check_user_number(){
		$number = $this->input->post('number');
		$user_check = $this->User_model->check_userNumber($number);
		if ($user_check > 0) {
			$this->session->set_userdata('user_phone', $number);
			$message = json_encode(array("statusCode"=>200));
		}else {
			$message = json_encode(array("statusCode"=>201));
		}
		echo $message;
	}
	
	public function create_user(){
		$data = $this->input->post('data');
		$user_data = array();
		$user_data['mobile_number'] = $data['phone_number'];
		$user_data['name'] = $data['full_name'];
		$user_data['email_addr'] = $data['email'];
		$user_created = $this->User_model->create_user($user_data);
		$this->session->set_userdata('user_phone', $data['phone_number']);
		$this->userLoginCheck();
	}

	public function userLoginCheck(){
		$user_number = $this->session->userdata('user_phone');
		$get_user_details = $this->User_model->getTheLoginUser($user_number);
		if($get_user_details){
			$this->session->unset_userdata('user_phone');
			$this->session->set_userdata('user_id', $get_user_details[0]['id']);
		}
		return redirect('home/checkout');
	}

	public function setDefaultAddress($address_id = NULL, $user_id = NULL){
		$user_id = $this->session->userdata('user_id');
		$this->User_model->removeDefaultAddress($address_id, $user_id);
		$this->User_model->addDefaultAddress($address_id, $user_id);
		return redirect('index.php/home/checkout');
	}

	public function user_details($user_id = null){
		$this->login_check();
		$user_id = $this->session->userdata('user_id');
		$user_data = $this->Admin_model->users($user_id);
		$user_address = $this->User_model->userAddress($user_id);
		$orders = $this->User_model->allorder($user_id);
		if(!empty($orders)){
			$order_details = $this->User_model->orderDetails($orders[0]['id']);
		}else{
			$order_details = '';
		}
		
		$data['data'] = array('user_data' =>$user_data, 'address' => $user_address, 'orders' =>$orders,  'order_details' => $order_details);
		$this->load->view('user_details/user_dashboard',$data);
	}

	public function order_details($order_id){
		$user_id = $this->session->userdata('user_id');
		//$order_details = $this->User_model->orderProductDetails($product_id);
		$order_details = $this->User_model->getAllUserOrders($order_id,$user_id);
		// $order_details = $this->Admin_model->all_order($order_id);
		$data['data'] = array('order_details' => $order_details);
		// echo "<pre>";
		// print_r($data);
		// print_r($this->db->last_query());
		$this->load->view('user_details/order_details', $data);
	}

	public function add_new_address($uri_segment = null, $user_id = null){
		$user_id = $this->session->userdata('user_id');
		$check_is_default = $this->User_model->getAddressByIdIsDefault($user_id);
		$user_address = array();
		$user_address['zip_code'] = $this->input->post('zip_code');
		$user_address['city'] = $this->input->post('city');
		$user_address['landmark'] = $this->input->post('landmark');
		$user_address['address'] = $this->input->post('address');
		$user_address['user_id'] = $this->input->post('id');
		if($check_is_default < 1){
			$user_address['is_default'] = 1;
		}
		$this->User_model->add_new_address($user_address);
		return redirect('index.php/Home/'.$uri_segment);
	}

	public function edit_Personal_details(){
		$user_address = array();
		$user_address['name'] = $this->input->post('name');
		$user_address['email_addr'] = $this->input->post('email_addr');
		$user_address['mobile_number'] = $this->input->post('mobile_number');
		$this->User_model->edit_Personal_details($this->input->post('id'), $user_address);
		return redirect('index.php/Home/user_details');
	}

	public function delete_address($id){
		$this->User_model->delete_user_address($id);
		$user_id = $this->session->userdata('user_id');
		$check_is_default = $this->User_model->getAddressByIdIsDefault($user_id);
		if($check_is_default < 1){
			$user_address = array();
			$user_address['is_default'] = 1;
			$this->User_model->makeDefaultAddressAfterDelete($user_address,$user_id);
		}
		return redirect('index.php/Home/user_details');
	}

	public function edit_user_address($id){
		$this->login_check();
		$data['data'] = array('address' => $this->User_model->getUserAddress($id));
		$this->load->view('user_details/user_address_edit', $data);
	}

	public function edit_address(){
		$data['zip_code'] = $this->input->post('zip_code');
		$data['city'] = $this->input->post('city');
		$data['landmark'] = $this->input->post('landmark');
		$data['address'] = $this->input->post('address');
		$data['data'] = array('address' => $this->User_model->editUserAddress($data, $this->input->post('id')));
		$this->load->view('user_details/user_address_edit', $data);
		return redirect('index.php/home/user_details');
	}

	public function placeOrder(){
		$data['user_id'] = $this->session->userdata('user_id');
		$data['product_id'] = json_encode($_POST['product_id']);
		$data['product'] = $_POST['product'];
		$data['address_id'] = $_POST['address_id'];
		$data['total_price'] = $_POST['total_price'];
		$data['place'] = $_POST['place'];
		$data['payment_mode'] = $_POST['payment_mode'];

		if ($this->User_model->place_order($data)) {
			$message =  json_encode(array("statusCode"=>200));
		}else {
			$message = json_encode(array("statusCode"=>201));
		}
		echo $message;
	}
	
	public function logout_user(){
		if($this->session->userdata('user_id')){
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('user_phone');
			$this->session->unset_userdata('user_phone');
			return redirect(base_url());
		}else{
			return redirect('/home');
		}
	}

	public function flashMessage(){
		$message = $this->input->get('msg');
		$type = $this->input->get('typ');
		$title = $this->input->get('ttl');
		$data['data'] = array('origin_page'=> base_url('Home/user_details'), 'message' => $message, 'title'=>$title, 'type'=> $type);
		$this->load->view('popup_message/success', $data);
	}

	public function aboutUs(){
		$this->load->view('about_us');
	}


}

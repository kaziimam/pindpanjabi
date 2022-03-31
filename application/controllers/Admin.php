<?php 
	class Admin extends MY_Controller{


		function __construct() {
			parent::__construct();
			$method=  $this->router->fetch_method();
			$allowed=array('index');
			if(!in_array($method,$allowed)){
				$this->login_check();
			}
		}

		public function login_check(){
			if (!$this->session->userdata('user') || !$this->session->userdata('id')) {
				return redirect(base_url('admin'));
			}
			if ($this->session->userdata('user') == "Admin") {
				$is_admin = 1;
			}elseif ($this->session->userdata('user') == "User") {
				$is_admin = 0;
			}
		}
		
		public function index(){
			if ($this->session->userdata('user')) {
				redirect("/admin/home");
			}else{
				$this->form_validation->set_rules('uname','User Name','required|valid_email');
                $this->form_validation->set_rules('password','Password','required');
                $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
                if($this->form_validation->run()){
                    $user_name = $this->input->post('uname');
                    $password = md5($this->input->post('password'));
                    $login = $this->Admin_model->login_user($user_name,$password);
                    if($login){
                        $this->session->set_userdata('user',$login['user']);
                        $this->session->set_userdata('id', $login['user_id']);
                        return redirect('/admin/index');
                    }else{
                        $this->session->set_flashdata('Login_failed','Invalid Username/Password');
                        return redirect(base_url('admin'));
                    }
                }else{
                    $this->load->view("/admin/signin");
                }
			}
		}

		public function logout(){
			if($this->session->userdata('user')){
	            $this->session->unset_userdata('user');
	            $this->session->unset_userdata('id');
	            return redirect(base_url('admin'));
            }else{
                return redirect('/home/login');
            }
		}

		public function home(){
			$this->login_check();
			$this->load->view("/admin/index");
		}

		public function customers(){
			$data = $this->Admin_model->customers();
			$data_array['data'] = array('customer'=>$data);
			$this->load->view("/admin/customers", $data_array);
		}

		public function add_customer(){
			$this->login_check();
			//$user_details = $this->Admin_model->users();
			$data['data'] = array($user_details);
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('number', 'Mobile Number', 'required|numeric|exact_length[10]|is_unique[customers.number]');
			$this->form_validation->set_rules('email', 'Email Id','valid_email|is_unique[customers.email]');
			$this->form_validation->set_rules('shop_name', 'Shop Name','required|is_unique[customers.shop_name]');
			$this->form_validation->set_rules('ref', 'Referance Name','required');
			
			if ($this->form_validation->run()) {
				$customer = array();
				$customer['name'] = $this->input->post('name');
				$customer['mobile_number'] = $this->input->post('number');
				$customer['email_addr'] = $this->input->post('email');
				$customer['ref_by'] = $this->input->post('ref');
				$customer['address'] = $this->input->post('address');

				$config = ['upload_path' => './assest/images/product/', 'allowed_types' => 'gif|jpg|jpeg|png', 'remove_spaces' => true, 'encrypt_name' => true];
				$this->load->library('upload', $config);
				$this->upload->do_upload('image');

				$customer['image'] = $this->upload->data()['raw_name'].$this->upload->data()['file_ext'];
				$this->Admin_model->customer_insert($customer);
				return redirect(base_url('/index.php/admin/customers'));
			}
			$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
			$this->load->view("/admin/add_customer", $data);
		}

		public function add_product(){
			$product_category['data'] = array($this->Admin_model->product_category(), $this->Admin_model->places()) ;
			
			$this->form_validation->set_rules('product_name', 'Name', 'required');
			$this->form_validation->set_rules('product_type', 'Category', 'required');
			$this->form_validation->set_rules('qty', 'QTY','required');
			$this->form_validation->set_rules('mrp', 'MRP','required');
			$this->form_validation->set_rules('selling_price', 'selling Price','required');
			
			if ($this->form_validation->run()) {
				$config = ['upload_path' => './assest/images/product/', 'allowed_types' => 'gif|jpg|jpeg|png', 'remove_spaces' => true, 'encrypt_name' => true];
				$this->load->library('upload', $config);
				$this->upload->do_upload('image');

				$product = array();
				$product['name'] = $this->input->post('product_name');
				$product['product_type'] = $this->input->post('product_type');
				$product['mrp'] = $this->input->post('mrp');
				$product['qty'] = $this->input->post('qty');
				$product['selling_price'] = $this->input->post('selling_price');
				$product['product_discription'] = $this->input->post('discription');
				$product['place_id'] = $this->input->post('place');

				if($this->input->post('is_veg')){
					$product['is_veg'] = 1;
				}else{
					$product['is_veg'] = 0;
				}
				//$product['is_veg'] = $this->input->post('is_veg');
				$product['img'] = $this->upload->data()['file_name'];

				// echo "<pre>";
				// print_r($product);exit();

				$this->Admin_model->product_insert($product);
				return redirect('/admin/all_product');
			}
			$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
			$this->load->view("/admin/product_upload", $product_category);
		}

		public function all_product(){
			$pagination = ['base_url'=>base_url('index.php/admin/all_product'),
                        'total_rows'=> $this->Admin_model->allproduct(),
                        'per_page'=>100,
                        'next_tag_open'=>'<button class="btn btn-info" style="margin: 5px;">',
                        'next_tag_close'=>'</button>',
                        'prev_tag_open'=>'<button class="btn btn-info" style="margin: 5px;">',
                        'prev_tag_close'=>'</button>',
                        'num_tag_open'=>'<span class="btn btn-info"  style="margin: 5px;">',
                        'num_tag_close'=>'</span>',
                        'cur_tag_open'=>'<span class="btn btn-warning"  style="margin: 5px;"><a style="color:#fff">',
                        'cur_tag_close'=>'</a></span>',
                        'last_link'=>'<span class="btn ">',
                        'first_link'=>'<span class="btn ">',
                    ];
            $this->pagination->initialize($pagination);
			$products['data'] = $this->Admin_model->selectProductCategory($pagination['per_page'], $this->uri->segment(3));
			$this->load->view('/admin/all_product', $products);
		}

		public function delete_product($id){
			$this->login_check();
			$this->Admin_model->delete_product($id);
				//echo 'test';
				return redirect('/admin/all_product');
		}

		public function edit_product($id){
			// $this->login_check();
			$product_category = $this->Admin_model->product_category();
			$product = $this->Admin_model->selectProductById($id);
			// print_r($this->db->last_query());
			$all_data['data'] = array('product_category' => $product_category, 'place'=> $this->Admin_model->places(),'product' =>$product);
			// echo "<pre>";
			// print_r($all_data);
			$this->load->view('/admin/product_upload', $all_data);
		}

		public function do_edit(){
			$this->form_validation->set_rules('product_name', 'Name', 'required');
			$this->form_validation->set_rules('product_type', 'Category', 'required');
			$this->form_validation->set_rules('qty', 'QTY','required');
			$this->form_validation->set_rules('mrp', 'MRP','required');
			$this->form_validation->set_rules('selling_price', 'selling Price','required');

			if ($this->form_validation->run()) {
				$config = ['upload_path' => './assest/images/product/', 'allowed_types' => 'gif|jpg|jpeg|png', 'remove_spaces' => true, 'encrypt_name' => true];
				$this->load->library('upload', $config);
				$this->upload->do_upload('image');

				$product = array();
				$product['name'] = $this->input->post('product_name');
				$product['product_type'] = $this->input->post('product_type');
				$product['mrp'] = $this->input->post('mrp');
				$product['qty'] = $this->input->post('qty');
				$product['selling_price'] = $this->input->post('selling_price');
				$product['product_discription'] = $this->input->post('discription');
				$product['place_id'] = $this->input->post('place');
				
				if($this->input->post('is_veg')){
					$product['is_veg'] = 1;
				}else{
					$product['is_veg'] = 0;
				}

				if (!empty($this->upload->data()['file_name'])) {
					$product['img'] = $this->upload->data()['file_name'];
				}
				$this->Admin_model->edit_product($this->input->post('id'), $product);
				return redirect('/admin/all_product');
			}
		}

		public function add_buy_product(){
			$this->form_validation->set_rules('name', 'Product Name', 'required|is_unique[buy_product.name]');
			$this->form_validation->set_rules('buy_from', 'Buyer Name', 'is_unique[buy_product.buy_from]');
			$this->form_validation->set_rules('buyer_address', 'Buyer Address', 'is_unique[buy_product.buyer_address]');
			$this->form_validation->set_rules('buy_price', 'Price','required');
			$this->form_validation->set_rules('qty', 'QTY','required');
			$this->form_validation->set_rules('size', 'Size','required');
			$this->form_validation->set_rules('expence', 'Expence','required');
			$this->form_validation->set_rules('seling_price', 'Selling Price','required');

			if ($this->form_validation->run()) {

				$config = ['upload_path' => './assest/images/product/', 'allowed_types' => 'gif|jpg|jpeg|png', 'remove_spaces' => true, 'encrypt_name' => true];
				$this->load->library('upload', $config);
				$this->upload->do_upload('image');

				$buy_product = array();
				$buy_product['image'] = $this->upload->data()['raw_name'].$this->upload->data()['file_ext'];
				$buy_product['name'] = $this->input->post('name');
				$buy_product['buy_from'] = $this->input->post('buy_from');
				$buy_product['buyer_number'] = $this->input->post('buyer_number');
				$buy_product['buyer_address'] = $this->input->post('buyer_address');
				$buy_product['buy_price'] = $this->input->post('buy_price');
				$buy_product['category'] = $this->input->post('category');
				$buy_product['qty'] = $this->input->post('qty');
				$buy_product['expence'] = $this->input->post('expence');
				$buy_product['size'] = $this->input->post('size');

				$final_buying_price = ($buy_product['buy_price'] + ($buy_product['expence']/$buy_product['qty']));
				$buy_product['seling_price'] = ($final_buying_price * ($this->input->post('seling_price')/100)) + $final_buying_price;

				$buy_product['total_bill'] = ($buy_product['buy_price'] * $buy_product['qty']) + $buy_product['expence'] ;
				$buy_product['heel'] = $this->input->post('heel');
				$buy_product['packing'] = $this->input->post('packing');
				$buy_product['sole'] = $this->input->post('sole');

				$this->Admin_model->add_buy_product($buy_product);

				$product_entry = array();
				$product_entry['name'] = $this->input->post('name');
				$product_entry['category'] = $this->input->post('category');
				$product_entry['purches_price'] = $this->input->post('buy_price');
				
				$product_entry['qty'] = $this->input->post('qty');
				$product_entry['expence'] = $this->input->post('expence');
				$product_entry['image'] = $this->upload->data()['raw_name'].$this->upload->data()['file_ext'];
				$product_entry['size'] = $this->input->post('size');
				$product_entry['seling_price'] = ($final_buying_price * ($this->input->post('seling_price')/100)) + $final_buying_price;

				
				$product_entry['discription'] = $this->input->post('heel')."<br>".$this->input->post('packing')."<br>".$this->input->post('sole');
				$this->Admin_model->product_insert($product_entry);

				$buyer_details = array();
				$buyer_details['name'] = $this->input->post('buy_from');
				$buyer_details['number'] = $this->input->post('buyer_number');
				$buyer_details['address'] = $this->input->post('buyer_address');
				$bd = $this->Admin_model->add_buyer_details($buyer_details);

				return redirect('/index.php/admin/buy_product');
			}
			$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
			$this->load->view('/admin/add_buy_product');
		}

		public function edit_buy_product($id){
			$data['data'] = $this->Admin_model->Getedit_product_data($id);

			$this->form_validation->set_rules('name', 'Product Name', 'required');
			$this->form_validation->set_rules('buy_from', 'Buyer Name');
			$this->form_validation->set_rules('buyer_address', 'Buyer Address');
			$this->form_validation->set_rules('buy_price', 'Price','required');
			$this->form_validation->set_rules('qty', 'QTY','required');
			$this->form_validation->set_rules('size', 'Size','required');
			$this->form_validation->set_rules('expence', 'Expence','required');
			$this->form_validation->set_rules('seling_price', 'Selling Price','required');

			if ($this->form_validation->run()) {
				$config = ['upload_path' => './assest/images/product/', 'allowed_types' => 'gif|jpg|jpeg|png', 'remove_spaces' => true, 'encrypt_name' => true];
				$this->load->library('upload', $config);
				$this->upload->do_upload('image');

				$buy_product = array();
				if (!empty($this->upload->data()['raw_name'])) {
					$buy_product['image'] = $this->upload->data()['raw_name'].$this->upload->data()['file_ext'];
				}
				$buy_product['name'] = $this->input->post('name');
				$buy_product['buy_from'] = $this->input->post('buy_from');
				$buy_product['buyer_number'] = $this->input->post('buyer_number');
				$buy_product['buyer_address'] = $this->input->post('buyer_address');
				$buy_product['buy_price'] = $this->input->post('buy_price');
				$buy_product['category'] = $this->input->post('category');
				$buy_product['qty'] = $this->input->post('qty');
				$buy_product['expence'] = $this->input->post('expence');
				$buy_product['size'] = $this->input->post('size');

				$final_buying_price = ($buy_product['buy_price'] + ($buy_product['expence']/$buy_product['qty']));
				$buy_product['seling_price'] = ($final_buying_price * ($this->input->post('seling_price')/100)) + $final_buying_price;

				$buy_product['total_bill'] = ($buy_product['buy_price'] * $buy_product['qty']) + $buy_product['expence'] ;;
				$buy_product['heel'] = $this->input->post('heel');
				$buy_product['packing'] = $this->input->post('packing');
				$buy_product['sole'] = $this->input->post('sole');

				$this->Admin_model->do_edit_buy_product($id,$buy_product);

				$product_entry = array();
				$product_entry['name'] = $this->input->post('name');
				$product_entry['category'] = $this->input->post('category');
				$product_entry['purches_price'] = $this->input->post('buy_price');
				
				$product_entry['qty'] = $this->input->post('qty');
				$product_entry['expence'] = $this->input->post('expence');
				if (!empty($this->upload->data()['raw_name'])) {
					$product_entry['image'] = $this->upload->data()['raw_name'].$this->upload->data()['file_ext'];
				}
				$product_entry['size'] = $this->input->post('size');
				$product_entry['seling_price'] = ($final_buying_price * ($this->input->post('seling_price')/100)) + $final_buying_price;
				
				$product_entry['discription'] = $this->input->post('heel')."<br>".$this->input->post('packing')."<br>".$this->input->post('sole');
				$this->Admin_model->edit_product($id,$product_entry);

				return redirect('/index.php/admin/buy_product');
			}
			$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
			$this->load->view('admin/add_buy_product', $data);
		}

		public function order(){
			// $this->login_check();
			$order['data'] = $this->Admin_model->all_order();
			$this->load->view('/admin/order', $order);
		}

		public function add_order(){
			$this->form_validation->set_rules('name','Shop Name','required');
			$this->form_validation->set_rules('product','Product Name','required');
			$this->form_validation->set_rules('qty','QTY','required');
			if ($this->form_validation->run()) {
				$this->Admin_model->add_order($this->input->post());
				return redirect('index.php/admin/order');
			}
			$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
			$this->load->view('/admin/add_order');
		}

		public function edit_order($id = null){
			$order['data'] = $this->Admin_model->edit_order($id);

			$this->form_validation->set_rules('name','Shop Name','required');
			$this->form_validation->set_rules('product','Product Name','required');
			$this->form_validation->set_rules('qty','QTY','required');
			if ($this->form_validation->run()) {
				$order = array();
				$order['name'] = $this->input->post('name');
				$order['product'] = $this->input->post('product');
				$order['qty'] = $this->input->post('qty');
				$order_id = $this->input->post('id');
				$this->Admin_model->do_edit_order($order_id, $order);
				return redirect('index.php/admin/order');
			}
			$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
			$this->load->view('/admin/add_order',$order);
		}

		public function reject_order($id = null){
			$data['order_status'] = "Rejected";
			$this->Admin_model->status_order($id, $data);
			return redirect('/admin/order');
		}

		public function approveOrder($id = null){
			$data['order_status'] = "Approved";
			$this->Admin_model->status_order($id, $data);
			return redirect('/admin/order');
		}

		public function all_bill(){
			$data['data'] = $this->Admin_model->all_bill();
			$this->load->view('admin/all_bill', $data);
		}

		public function place(){
			$data['data'] = array('places' => $this->Admin_model->places());
			$this->load->view('admin/place', $data);
		}

		public function disablePlace($id){
			$data['place_status'] = "0";
			$this->Admin_model->placeStatus($id, $data);
			return redirect('/admin/place');
		}

		public function approvePlace($id){
			$data['place_status'] = "1";
			$this->Admin_model->placeStatus($id, $data);
			return redirect('/admin/place');
		}

		public function edit_place($id){
			$data['data'] = $this->Admin_model->getPlaceById($id);
			$this->load->view('admin/edit_admin_data', $data);
			// $data['place_status'] = "1";
			// $this->Admin_model->placeStatus($id, $data);
			// return redirect('/admin/place');
		}

		public function place_update(){
			$category_id = $this->input->post('category_id');
			$data['category_name'] = $this->input->post('category_name');
			$this->Admin_model->editPlace($category_id,$data);
			return redirect('admin/allCategory');
		}

		public function allCategory(){
			$data['data'] = array('all_category' => $this->Admin_model->all_category());
			$this->load->view('admin/all_category', $data);
		}

		public function add_category(){
			$data = array();
			$data['category_name'] = $this->input->post('category_name');
			$this->Admin_model->add_category($data);
			return redirect('admin/allCategory');
		}

		public function edit_category($id){
			$data['data'] = $this->Admin_model->getCategoryById($id);
			$this->load->view('admin/edit_admin_data', $data);
		}

		public function category_update(){
			$category_id = $this->input->post('category_id');
			$data['category_name'] = $this->input->post('category_name');
			$this->Admin_model->editCategory($category_id,$data);
			return redirect('admin/allCategory');
		}

		public function deleteCategory($id){
			$this->Admin_model->delete_category($id);
			return redirect('admin/allCategory');
		}

		public function edit_admin_data(){
			$this->load->view('admin/edit_admin_data');
		}
		
	}
 ?>
<?php 
	class Admin_model extends CI_model{
		public function login_user($user_name,$password){
			$data = array('email_addr' => $user_name, 'password' => $password);
			$this->db->where($data);
			$user = $this->db->get('users');

			if($user->num_rows() > 0){
				return array('user' => $user->row()->user_type, 'user_id' => $user->row()->id);
			}else{
				false;
			}
		}

		public function users($user_id){
			return $this->db->where('id', $user_id)
							->get('users')->result_array();
		}

		public function product_category(){
			return $this->db->get('product_category')->result_array();
		}

		public function product_insert($product){
			$this->db->insert('products', $product);
		}

		public function select_product($limit, $offset){
			return $this->db->select()
                        ->from('products')
                        ->limit($limit,$offset)
                        ->get()->result_array();
		}

		public function selectProductCategory($limit, $offset){
			if($offset > 0){$offset = ",".$offset;}
			return $this->db->query("SELECT *,products.id AS product_id, places.name AS place_name, products.img AS product_img, products.name AS product_name, places.img AS place_img FROM products LEFT JOIN product_category ON products.product_type = product_category.id LEFT JOIN places On products.place_id = places.id LIMIT $limit $offset")->result_array();
		}

		public function all_product(){
			return $this->db->get('products')->result_array();
		}

		public function allproduct(){
			return $this->db->get('products')->num_rows();
		}

		public function selectProductById($id){
			return $this->db->where('id', $id)
						->get('products')->result_array();
		}

		public function delete_product($id){
			$this->db->where('id', $id)
					->delete('products');
		}

		public function edit_product($id, $product){
			$this->db->where('id', $id);
			$this->db->update('products', $product);
		}

		public function add_product_category($data){
			$this->db->insert('product_category', $data);
		}

		public function all_order(){
			// return $this->db->get('orders')->result_array();
			return $this->db->query("SELECT *,orders.id AS order_id, products.name AS product_name,users.name as user_name, users.mobile_number AS user_number, products.img AS product_img, address.address AS order_address,address.landmark AS order_landmark,address.city AS order_city,address.zip_code AS order_zip, places.name AS place_name  FROM orders LEFT JOIN products ON products.id = orders.product_id LEFT JOIN users ON users.id = orders.user_id LEFT JOIN address ON orders.address_id = address.id LEFT JOIN places ON places.id = orders.place  ORDER BY `orders`.`id` DESC")->result_array();
		}

		public function add_order($data){
			$this->db->insert('orders', $data);
		}

		public function order_count(){
			return $this->db->select_sum('qty')
						->get('orders')->result_array();
		}

		public function edit_order($id){
			return $this->db->where('id', $id)
							->get('orders')->result_array();
		}

		public function do_edit_order($id, $data){
			$this->db->where('id', $id);
			$this->db->update('orders', $data);

		}

		public function delete_order($id){
			$this->db->where('id', $id)
						->delete('orders');
		}

		public function status_order($id, $data){
			$this->db->where('id', $id)
					->update('orders', $data);
		}

		public function places(){
			return $this->db->get('places')->result_array();
		}

		public function getPlaceById($id){
			return $this->db->where('id', $id)
							->get('places')->result_array();
		}


		public function placeStatus($id, $data){
			$this->db->where('id', $id)
					->update('places', $data);
		}

		public function all_category(){
			return $this->db->get('product_category')->result_array();
		}

		public function getCategoryById($id){
			return $this->db->where('id', $id)
							->get('product_category')->result_array();
		}

		public function add_category($data){
			$this->db->insert('product_category', $data);
		}

		public function delete_category($id){
			$this->db->where('id', $id)
					->delete('product_category');
		}

		public function editCategory($id, $data){
			$this->db->where('id', $id)
					->update('product_category', $data);
		}

		public function customers(){
			return $this->db->get('users')->result_array();
		}

		public function customer_insert($data){
			$this->db->insert('users', $data);
		}
	}
 ?>
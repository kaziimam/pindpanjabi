<?php 
    class User_model extends CI_model{
        public function getplace($place_name){
            return $this->db->where('name', $place_name)
                            ->get('places')->result_array();
        }

        public function getProductCategory(){
            return $this->db->get('product_category')->result_array();
        }



        public function getSingleProduct($id){
            return $this->db->where('id', $id)
                        ->get('products')->row();
        }
        
        public function getAllproduct($place_id){
            return $this->db->where('place_id', $place_id)
                        ->get('products')->result_array();
        }

        public function getItemCount($product_category_name, $place_id){
            return $this->db->where('place_id', $place_id)
                            ->where('product_type', $product_category_name)
                            ->get('products')->result();
        }

        public function productWithCategory($place_id){
            // $this->db->select('*');
            // $this->db->from('product_category');
            // $this->db->join('products', 'products.product_type = product_category.name');
            return $query = $this->db->query("SELECT *,products.id as product_id FROM products LEFT JOIN product_category ON products.product_type = product_category.id where `place_id` = $place_id")->result_array();
        }

        public function category_check(){
            
        }

        public function userAddress($id){
            return $this->db->where('user_id', $id)
                            ->get('address')->result_array();
        }

        public function add_new_address($data){
            $this->db->insert('address', $data);
        }

        public function edit_Personal_details($id, $data){
            $this->db->where('id', $id);
			$this->db->update('users', $data);
        }

        public function delete_user_address($id){
            $this->db->where('id', $id)
						->delete('address');
        }

        public function allorder($id){
            return $this->db->where('user_id', $id)
                            ->get('orders')->result_array();
        }

        public function orderDetails($id){
            return $this->db->query("SELECT * FROM orders LEFT JOIN products ON orders.product_id = products.id where `user_id` = $id")->result_array();
        }

        public function orderProductDetails($id){
            return $this->db->where('id', $id)
                            ->get('products')->result_array();
        }

        public function getOrderProductDetails($product_id){
            return $this->db->where('id', $product_id)
                            ->get('products')->result_array();
        }

        public function check_userNumber($number){
            return $this->db->where('mobile_number', $number)
                            ->get('users')->num_rows();
        }

        public function create_user($data){
            $this->db->insert('users', $data);
        }

        public function getTheLoginUser($user_number){
            return $this->db->where('mobile_number', $user_number)
                        ->get('users')->result_array();     
        }

        public function removeDefaultAddress($address_id, $user_id){
            $this->db->query("UPDATE `address` SET `is_default` = '0' WHERE `address`.`user_id` = $user_id");
        }

        public function addDefaultAddress($address_id, $user_id){
            $this->db->query("UPDATE `address` SET `is_default` = '1' WHERE `address`.`id` = $address_id  AND user_id = $user_id");
        }

        public function getUserAddress($id){
            return $this->db->where('id', $id)
                    ->get('address')->result_array();
        }

        public function editUserAddress($data, $id){
            $this->db->where('id', $id)
                    ->update('address', $data);
        }

        public function place_order($data){
            $this->db->insert('orders', $data);
        }

        public function getAllUserOrders($order_id){
            return $this->db->query("SELECT * FROM orders where id = $order_id ")->result_array();
        }

        public function getProductDetailsByid($id){
            return $this->db->query("SELECT * FROM orders where id = $order_id ")->result_array();
        }

        public function getAddressByIdIsDefault($user_id){
            return $this->db->where('user_id', $user_id)
                    ->where('is_default', 1)
                    ->get('address')->num_rows();
        }

        public function makeDefaultAddressAfterDelete($data, $user_id){
            $this->db->where('user_id', $user_id)
                    ->update('address', $data);
        }

    }
?>
<?php 
    class Category{
        private $db;

        public function __construct(){
			$this->db = new DataBase;
        }

        public function addCategory($categoryName){
            $this->db->query('INSERT INTO category (category_name) VALUES (:category_name)');
            # Link values 
            $this->db->bind(':category_name', $categoryName);
            
            # Run
            if ($this->db->execute()){
                return $this->getCategoryId($categoryName);
            }
            else{ return null; }
        }

        public function getCategoryId($categoryName){
            $this->db->query('SELECT category_id FROM category WHERE category_name = :category_name');
			$this->db->bind(':category_name', $categoryName);
			$response = $this->db-> getRecord();
			return $response->category_id;
        }

        public function getCategories(){
            $this->db->query('SELECT * FROM category ORDER BY category_name DESC');
			$result = $this->db->getRecords(); 
			$response = array(); 
			foreach ($result as $key => $value) {
				$response[$value->category_id] = $value->category_name;
			}
			return $response;
        }
            
    } 
 ?>

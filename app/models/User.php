<?php  

	class User{
		private $db;
		
		public function __construct(){
			$this->db = new DataBase;
		}

		public function getByEmail($email){ 
			$user =  $this->db->deleteSpecialChars($username, 'char'); 
			$this->db->query('SELECT surveyr_name, surveyr_lastname, surveyr_password 
							  FROM surveyr 
							  WHERE surveyr_email = :email');
			$this->db->bind(':email', $email);

			$response = $this->db->getRecord();
			return $response;
		}

		public function userRecord($param){
			/*$this->db->query('INSERT INTO user (user_nick, user_email, user_password)
									 VALUES (:user_nick, :user_email, :user_password)');

			# Link values
			$this->db->bind(':user_nick', $param['user-nick']);
			$this->db->bind(':user_email', $param['user-email']);
			$this->db->bind(':user_password', $param['user-password']);

			# Run
			if($this->db->execute()){
				return true;
			}
			else{ return false; }
			*/
		}
	}

 ?>

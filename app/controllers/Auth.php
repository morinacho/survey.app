<?php  

	class Auth extends Controller{
		private $userModel;

		public function __construct(){
			$this->userModel = $this->model('User');
			session_start(); 
		}

		public function login(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
				if(isset($_POST['email']) && isset($_POST['password'])){
					$email = $_POST['email'];
					$pass	  = $_POST['password']; 
					$user	  = $this->userModel->getByEmail($email);
					
					if(!empty($user) && password_verify($pass, $user->surveyr_password)){ 
						$_SESSION['user'] = $user->surveyr_name." ".$user->surveyr_lastname;
						redirect('home');
					}
					else{
						redirect('login');
					}
				}
				else{
					redirect('login');
				}
			} 	 
		}

		public function register(){
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register'])){
				$options = ['cost' => 12];
				$pass = password_hash(trim($_POST['user-password']), PASSWORD_BCRYPT, $options);
				$param = [
					'user-nick' 	=> trim($_POST['user-nick']),
					'user-email' 	=> trim($_POST['user-email']),
					'user-password' => $pass
				];
				if($this->userModel->userRecord($param)){
					redirect('home');
				}
				else{
					die("FATAL ERROR");
				}
			}
			else{
				$param = [
					'user-name' 	=> '',
					'user-lastname' => '',
					'user-phone' 	=> '',
					'user-address' 	=> ''
				];
			}

		}

		public function logout(){
			session_unset();
        	session_destroy();
        	redirect('login');
		}
	}

?>
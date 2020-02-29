<?php  

	class Auth extends Controller{
		private $userModel;

		public function __construct(){
			$this->userModel = $this->model('User');
			session_start(); 
		}

		public function login(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
				if(isset($_POST['username']) && isset($_POST['password'])){
					$username = $_POST['username'];
					$pass	  = $_POST['password']; 
					$user	  = $this->userModel->getByUsername($username);
					
					if(!empty($user) && password_verify($pass, $user->usuario_contrasenia)){ 
						$_SESSION['user'] = $user->usuario_nombre;
					}   
				}
			} 	
			redirect('index'); 
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
<?php   

	class Home extends Controller{
		
		public function __construct() {
			
		}

		public function index(){
			$this->view('index');
		}

		public function configuration(){
			$this->view("modules/config");
		}
	}

?>
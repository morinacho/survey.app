<?php  
	session_start(); 
	if (Controller::authenticated()){
		require_once APP_ROUTE . '/views/modules/header.php';
		require_once APP_ROUTE . '/views/modules/home.php';
		require_once APP_ROUTE . '/views/modules/footer.php';  
	}
 	else{
		require_once APP_ROUTE . '/views/modules/login.php'; 
	 }   
	
?>
<?php 
	require_once APP_ROUTE . '/views/modules/header.php'; 
	if (!Controller::authenticated()){
		require_once APP_ROUTE . '/views/modules/home.php';
	}
 	else{
		require_once APP_ROUTE . '/views/modules/login.php'; 
	 }  
    	
	require_once APP_ROUTE . '/views/modules/footer.php'; 
?>
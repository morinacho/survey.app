<?php  

	#Data base access config
	define('DB_HOST', 'localhost'); 	# Put the name of the host
	define('DB_USER', 'root'); 	 		# Put the username
	define('DB_PASSWORD', ''); 			# Put the password
	define('DB_NAME', 'survey.app');	# Put the data base name
	
	# App route
	define('APP_ROUTE', dirname(dirname(__FILE__)));

	# URL route
	define('URL_ROUTE', 'http://localhost/survey.app/'); # Put the url route of your site

	# Site name
	define('SITENAME', 'Survey App');  # Put the name of the site
	
?>
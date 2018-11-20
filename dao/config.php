<?php
//session_start();
require_once ('../admin/seguranca.php');

spl_autoload_register(function($class_name){
	$filename = "dao".DIRECTORY_SEPARATOR."class".DIRECTORY_SEPARATOR.$class_name .".php";

	if(file_exists($filename)){
		require_once ($filename);
	}

});

?>

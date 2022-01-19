<?php 


class Base_Controller{
	
	function __construct(){
		echo "Base_Controller created";

	}

	/* Validation method */
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function load_view($view, $args){


		foreach ($args as $vname => $vvalue) {
			
			$$vname = $vvalue;
		}
		require_once(__DIR__.'/../views/'.$view.'.php');
		
	}
}





?>
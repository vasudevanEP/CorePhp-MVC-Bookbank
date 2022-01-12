<?php 


class Base_Controller{
	
	function __construct(){
		echo "Base_Controller created";

	}


	function load_view($view, $args){


		foreach ($args as $vname => $vvalue) {
			
			$$vname = $vvalue;
		}
		require_once(__DIR__.'/../views/'.$view.'.php');
		
	}
}





?>
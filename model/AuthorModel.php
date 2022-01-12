<?php 

require_once(__DIR__.'/../core/Base_Model.php');

class AuthorModel extends Base_Model{

    private $table;

	function __construct(){
		parent::__construct();

        $this->table = 'authors';
	}

	function get_all(){

		return $this->read($this->table,array('*'),null);
	}

	function get($id){

		return $this->read($this->table, array('*'), array('id'=>$id));
	}


}
 ?>
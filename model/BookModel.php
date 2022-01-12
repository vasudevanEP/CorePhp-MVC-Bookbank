<?php 

require_once(__DIR__.'/../core/Base_Model.php');

class BookModel extends Base_Model{

    private $table;

	function __construct(){
		parent::__construct();

        $this->table = 'books';
	}

	function get_all($search=false){

		if($search){
			/* Send Join in array format */
			$join_table = array('join_table' => 'authors','between' => "$this->table.author_id = authors.id");

			$whereLike = array('authors.name'=> $search);
			return $this->read($this->table,array('books.*,authors.name as author_name'),false,$whereLike,$join_table);
		}
		else{
			$join_table = array('join_table' => 'authors','between' => "$this->table.author_id = authors.id");
			return $this->read($this->table,array('books.*,authors.name as author_name'),null,false,$join_table);
		}
	}

	function get($id){

		$join_table = array('join_table' => 'authors','between' => "$this->table.author_id = authors.id");
		return $this->read($this->table, array('books.*,authors.name as author_name'), array('books.id'=>$id),false,$join_table);
	}

	

}
 ?>
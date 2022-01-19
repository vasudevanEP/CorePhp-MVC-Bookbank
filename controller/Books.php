<?php

require_once(__DIR__.'/../model/BookModel.php');
require_once(__DIR__.'/../core/Base_Controller.php');

class Books extends Base_Controller{

function __construct(){
	// echo 'book controller CLASS CREATED '."<br />";
	$this->model = new BookModel();

}

function hello_get(){
    $this->load_view('home', array('content'=>'<h1>This content is sent from controller</h1>'));
	
}

/* Get Books on page load */
//http://localhost/index.php/books/getAll/
function getAll_get(){
	$books = $this->model->get_all();
		// echo json_encode($books);
    $this->load_view('books_page',array('books'=>$books));
}

/*
* Search the book based on post request 
*/
function getAll_post(){

    $search_term = '';
    if(isset($_POST))
    {
        $search_term = $this->test_input($_POST['term']);
    }
    
	$books = $this->model->get_all($search_term);
	// echo json_encode($books);
    $this->load_view('books_page',array('books'=>$books,'search_term'=>$search_term));
}

/* Get single book details. */
//http://localhost/index.php/book/get/2/
function get_get($id){
    $id = $this->test_input($id);
	$books = $this->model->get($id);
	// echo json_encode($books);
    $this->load_view('book_page',array('books'=>$books));


}

}


 ?>
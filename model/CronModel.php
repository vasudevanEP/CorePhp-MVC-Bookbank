<?php 

require_once(__DIR__.'/../core/Base_Model.php');

class CronModel extends Base_Model{

    private $table;

	function __construct(){
		parent::__construct();

        $this->params = [];
        $this->table = 'cron_history';
	}

	function get_all(){

		return $this->read($this->table,array('*'),null);
	}

	function get($id){

		return $this->read($this->table, array('*'), array('id'=>$id));
	}


    function check_cronfile($file,$filesize)
    {
        $resp = $this->read($this->table,array('*'),array('file'=>$file,'filesize'=>$filesize));
        if(empty($resp))
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    function create_update_book($book = [])
    {
        if(!empty($book))
        {
            
            $book_id = false;

            $book_author = $book['author'];
            /* Get the Author Name */
            $author_id = $this->get_author($book_author);
            
            /* Check the Book */
            $ch_book = $this->read('books',array('*'),array('author_id'=>$author_id),array('name'=>$book['name']));
            /* Create New book */
            if(empty($ch_book))
            {
                $save_book['name'] = $book['name'];
                $save_book['author_id'] = $author_id;
                $book_id = $this->create('books',$save_book);
            }

            return $book_id;

        }
    }

    function get_author($book_author_name)
    {
        $get_author = $this->read('authors',array('*'),false,array('name'=>$book_author_name));
            if(empty($get_author))
            {
                $author = $this->create('authors',array('name'=>$book_author_name));
                $author_id = $author;
            }
            else
            {
                $author_id = $get_author[0]['id'];
            }

            return $author_id;
    }

    function create_update_cron($file,$filesize)
    {
        return $this->create($this->table,array('file'=>$file,'filesize'=>$filesize));
    }

}
 ?>
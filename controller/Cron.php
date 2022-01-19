<?php 
require_once(__DIR__.'/../model/CronModel.php');

class Cron{

    protected $path;
    
    function __construct()
    {
        require_once(__DIR__.'/../config/cron.php');
		$this->cron_path = $book_folder;

        $this->model = new CronModel();
        
    }

    /*
    * Get Books from the XML file 
    */
    function getBooks_get()
    {
        $files = array_diff(scandir($this->cron_path), array('.', '..'));
        
        foreach($files as $file)
        {
            $get_books = $this->parseXml($this->cron_path,$file);
            if(isset($get_books) && !empty($get_books))
            {
                $filesize = filesize($this->cron_path.$file);
                
                /* Avoid if the file is already exist without any changes. */
                $check_old = $this->model->check_cronfile($file,$filesize);
                if($check_old)
                {
                    foreach($get_books['book'] as $key=>$book)
                    {
                        
                        $book_id = $this->create_update_book($book);
                    }

                    /* update the cron */
                    $this->model->create_update_cron($file,$filesize);
                    echo $file.' has updated <br>';
                }
                else
                {
                    echo $file.' already exist <br>';
                }
               
            }
        }
        
    }

    /*
    * Parse the XML file and convert xml to array 
    */
    public function parseXml($path,$file)
    {
        // Read entire file into string
        $xmlfile = file_get_contents($path.$file);
        
        // Convert xml string into an object
        $new = simplexml_load_string($xmlfile);
        
        // Convert into json
        $con = json_encode($new);
        
        // Convert into associative array
        $newArr = json_decode($con, true);
        return $newArr;
    }

    /* Create or Update books. If new books created and 
    * if already exist update the books details. 
    */
    public function create_update_book($book)
    {   
        if(!empty($book))
        {
            return $this->model->create_update_book($book);
        }
        else{
            return false;
        }
    }
}
<?php

require_once(__DIR__.'/database/DB_Connection.php');
//do not return anything if on error // now returning ERROR at blah blah
global $params;
class Base_Model{

	function __construct(){
		// echo 'Base_Model class created <br>';
		$db = new DB_Connection();
		$this->connection =  $db->getConnection();
	}
	
	function create($tableName,$insertWhat){

		$sql='INSERT INTO '.$tableName.' (';
		foreach ($insertWhat as $key => $value)
			$sql .= $key.',';
		
		  $sql=rtrim($sql,',');
		  $sql.=')';
		$sql.=' VALUES (';
		
		foreach ($insertWhat as $key => $value)
			$sql .= '?,';
		
		  $sql=rtrim($sql,',');
		  $sql.=')';

		  $sql=$this->appendSemicolon($sql);
		// echo $sql.'<br>';
		$result = $this->connection->prepare($sql)->execute(array_values($insertWhat));
		if($result)
			return $this->connection->lastInsertId();
		else
			return 'Error at BASE_MODEL/create'; 
	}

	/*
		****tablename necessary !
		$tableName => 'users'
		
		****what to read
		 use accorgingly if all read / read particular column	
		$args => array('*') / array('username','email')
		
		****optional arg (call with null argument to avoid warnings)
		//for where clause
		$whereArgs => array( 'username' => 'jigar_wala') 
	*/

	function read($tableName,$args,$whereArgs=false,$whereLikeArgs=false,$join=array()){
		
		$this->params = [];
		  $sql='SELECT ';

		 foreach ($args as $key => $value)
		  	 $sql.=$value.',';
		  $sql=rtrim($sql,',');
	   $sql.=' FROM '.$tableName;
	 
		if(!empty($join))
		{
			$sql .= ' JOIN '. $join['join_table'];
			if(isset($join['join_type']))
			{
				$sql .= " ".$join['join_type']." ";
			}
			$sql .= ' ON '.$join['between'];
		}
		
	   if($whereArgs)
	   $sql= $this->where($sql,$whereArgs);	
		
	   if($whereLikeArgs)
	   {
			
		   $is_where = $whereArgs?true:false;
		   $sql= $this->whereLike($sql,$whereLikeArgs,$is_where);

		   $whereArgs = $whereArgs?array_merge($whereArgs,$whereLikeArgs):$whereLikeArgs;
	   }
	
	   $sql=$this->appendSemicolon($sql);
	//    echo $sql.'<br>';
		$finale=array();

		$stmt = $this->connection->prepare($sql);
		$stmt->execute(array_values($this->params));
		$result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
		

		if(is_array($result)){
			
			foreach($result as $row)
			{
				array_push($finale,$row);
			}
			
		
		return $finale;
		}
		else
			return 'Error at BASE_MODEL/read';
		
	}

    function update($tableName,$whatToSet,$whereArgs){
    	$sql='UPDATE '.$tableName .' SET ';
    	foreach ($whatToSet as $key => $value)
    		$sql .= $key .'= ? ,';
    	$sql=rtrim($sql,',');

	   if($whereArgs)
		$sql= $this->where($sql,$whereArgs);	
		$sql=$this->appendSemicolon($sql);
    	// echo $sql.'<br>';
	  $result = $this->connection->prepare($sql)->execute(array_values($whereArgs));

		if($result)
			return $result;
		else
			return 'Error at BASE_MODEL/update';

    }

   function delete($tableName,$whereArgs){
   		$sql='DELETE FROM '.$tableName;

	   if($whereArgs)
	   	$sql=$this->where($sql,$whereArgs);
	   $sql=$this->appendSemicolon($sql);
	//    echo $sql.'<br>';
	   $result = $this->connection->prepare($sql)->execute(array_values($whereArgs));

		if($result)
			return $result;
		else
			return 'Error at BASE_MODEL/delete'; 


   }

    function where($sql,$whereArgs){
    	$sql.=' WHERE ';
    	
    	foreach ($whereArgs as $key => $value)
    	{	$sql.=$key.' = ? AND ';array_push($this->params,$value);}
    	$sql=rtrim($sql,'AND ');
		
    	      	
    	return $sql;
    }


	function whereLike($sql,$whereArgs,$is_where){
    	if($is_where):
		$sql.=' AND ';
		else:
		$sql.=' WHERE ';
    	endif;

    	foreach ($whereArgs as $key => $value)
    	{	$sql.=$key.' Like ? OR ';array_push($this->params,'%'.$value.'%');}
    	$sql=rtrim($sql,'OR ');
		
    	return $sql;
    }

	function appendSemicolon($sql){
		if(substr($sql,-1)!=';')
			return $sql.' ;';	
	}
}


// $obj=new Base_Model();

// $where['id']='3';
// $where['evw']=2;

// $rows=call_user_func_array(array($obj, 'create'), array('questions',array('user_id'=>1,'what'=>'isko insert karna he?')));
// $rows=call_user_func_array(array($obj, 'read'), array('users',array('*'),null));
// $rows=call_user_func_array(array($obj, 'update'), array('questions',array('what'=>'is science related to math?'),$where));
// $rows=call_user_func_array(array($obj, 'delete'), array('questions',$where));
// echo '<br>';
// print_r($rows)
// print_r(get_class_methods ( 'Base_Model' ));


?>
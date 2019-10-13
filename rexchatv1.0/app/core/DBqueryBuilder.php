<?php

class QueryBuilder {
	protected $conn;

	public function __construct(PDO $conn){
		$this->conn = $conn;
		$this->logger = require_once '../app/tools/logger.php';
	}

	public function flexyquery($sql, $returnValue = false){
		if ($returnValue){
			try {
            	$sql = $this->conn->prepare($sql);
            	$sql->execute();
            	return $sql->fetchAll(PDO::FETCH_CLASS);
    		} catch (PDOException $e) {
            	$error = $e->getMessage();
   			}
		} else {
			try {
            	$sql = $this->conn->prepare($sql);
            	$sql->execute();
            	return true;
    		} catch (PDOException $e) {
            	$error = $e->getMessage();
   			}
		}
		$this->logger->logg($error);
	}

	public function flexyquery_IntoClass($sql, $class, $returnValue = false){
		if ($returnValue){
			try {
            	$sql = $this->conn->prepare($sql);
            	$sql->execute();
            	return $sql->fetchAll(PDO::FETCH_CLASS, $class);
    		} catch (PDOException $e) {
            	$error = $e->getMessage();
   			}
		} else {
			try {
            	$sql = $this->conn->prepare($sql);
            	$sql->execute();
            	return true;
    		} catch (PDOException $e) {
            	$error = $e->getMessage();
   			}
		}
		$this->logger->logg($error);
	}

	public function provideAll($table){
    	try {
            $sql = "select * from {$table}";
            $sql = $this->conn->prepare($sql);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_CLASS);
    	} catch (PDOException $e) {
            $error = $e->getMessage();
            $this->logger->logg($error);
    	}
  	}

  	public function provideWhere($where, $table){    
    	$where = a_arr2and_str($where);    
    	try {
            $sql = "select * from {$table} where {$where}";
            $sql = $this->conn->prepare($sql);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_OBJ);
    	} catch (PDOException $e) {
            $error = $e->getMessage();
            $this->logger->logg($error);
    	}
	}
	
	public function provideWhere_IntoClass($where, $table, $class){    
		$where = a_arr2and_str($where);    
		try {
		$sql = "select * from {$table} where {$where}";
		$sql = $this->conn->prepare($sql);
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_CLASS, $class);
		} catch (PDOException $e) {
		$error = $e->getMessage();
		$this->logger->logg($error);
		}
	      }

	public function provideColumnsWhere_IntoClass($where, $col, $table, $class){
		$where = a_arr2and_str($where);
		$col = arr2coma_str($col);    
		try {
		$sql = "select {$col} from {$table} where {$where}";
		//dd($sql);
		$sql = $this->conn->prepare($sql);
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_CLASS, $class);
		} catch (PDOException $e) {      
		$error = $e->getMessage();            
		$this->logger->logg($error);
		return False;
		}  
	      }
  	public function provideColumnsWhere($where, $col, $table){
    	$where = a_arr2and_str($where);
    	$col = arr2coma_str($col);    
    	try {
	    $sql = "select {$col} from {$table} where {$where}";
	    //dd($sql);
            $sql = $this->conn->prepare($sql);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_CLASS);
    	} catch (PDOException $e) {      
            $error = $e->getMessage();            
	    $this->logger->logg($error);
	    return False;
    	}  
  	}
  
  	public function provideColumns($col, $table){    
    	$col = arr2coma_str($col);
    	try {

            $sql = "select {$col} from {$table}";
 			$sql = $this->conn->prepare($sql);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_OBJ);
    	} catch (PDOException $e) {      
            $error = $e->getMessage();
            $this->logger->logg($error);
    	}
  	}
  
  	public function changeWhere($where, $set, $table){
    	$where = a_arr2and_str($where);
    	$set = a_arr2key_equal_val_coma_str($set);
    	try {
			$sql = "update {$table} set {$set} where {$where}";
            $sql = $this->conn->prepare($sql);
            $sql->execute();
            return true;
    	} catch (PDOException $e) {      
            $error = $e->getMessage();
            $this->logger->logg($error);
    	}
  	}

  	public function addOne($data, $table){    
    	$data = a_arr2key_val_coma_str($data);  
    	$col = $data[0];    
    	$values = $data[1];    
    	try {
            $sql = "insert into {$table} ({$col}) values ({$values})";
            $sql = $this->conn->prepare($sql);
            $sql->execute();
            return true;
    	} catch (PDOException $e) {     
			$error = $e->getMessage(); 
			//dd($error);           
            $this->logger->logg($error);
    	}
  	}
}

?>
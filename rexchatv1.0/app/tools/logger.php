<?php
	class logger{
	    private $file;
	    public function __construct($file){
	        $this->file = $file;
	    }
	    
	    public function logg($data){
	        $time = date("h:i:sa");        
	        $logdata = $time. " :--: ".$data."\n";        
	        fwrite($this->file, $logdata);       
	        return true;       
	    }
	    
	    public function stoplogging(){
	        fclose($this->file);        
	    }
	}

    $myfile = fopen("log.txt", "a"); //or die("Unable to open file!");   
    return new logger($myfile);
?>
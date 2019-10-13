<?php

class ErrorMsg 
{
    protected $err = "";

    public function msg()
    {
        return $this->err;
    }

    static function getErr($err)
    {
        return new ErrorMsg($err);
    }

    function __construct($err)
    {
        $this->err = $err;
    }
}
?>
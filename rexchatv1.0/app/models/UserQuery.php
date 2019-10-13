<?php

class UserQuery extends QueryBuilder
{
    protected $table = "userdata";
    
    function getUser()
    {
        return $this->provideAll($this->table);
    }

    public function login($user, $pass)
    {
        $userdetails = $this->provideWhere(

            ["user" => $user, "pass" => $pass],
            
            $this->table
        );
        
        $userdetails = $userdetails ? $userdetails[0] : FALSE;

        return $userdetails;

    }

    public function set($where, $set)
    {
        $this->changeWhere($where, $set, $this->table);
    }
    
    public function getUserData($userId, $class)
    {
        
        return $this->provideWhere_IntoClass(

            $userId,

            $this->table,
             
            $class

        )[0];

    }

    public function enterData($a_arr)
    {
        $this->addOne($a_arr, $this->table);
    }
}

?>
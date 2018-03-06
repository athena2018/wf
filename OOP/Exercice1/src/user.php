<?php 

use Model\Role;

class user{
    private $id;
    protected $roles =[];
    protected $password;
    protected $salt;
    protected $username;
    
    function getId() {
        return$id;
    }
    function getRoles(){
        return $Roles;
    }
    function getPassword(){
        return $Password;
    }
    function getSalt(){
        return$salt;
    }
    
    protected function getRoles(string $roles){
        $this->role = $roles;
        return $this;
    }
    
    protected function getPassword (string $password){
        $this->password = $password;
        return $this;
        
    }
    protected function getSalt(string $salt){
        $this->salt = $salt;
        return $this;
    }
    protected function getUsername(string $username){
        $this->username = $username;
        return $this;
    }
    
    //eraseCredentials	Erase stored salt and password data
    protected function __destruct($salt){
       $this->salt;
        fclose($this);
    }
    
    
    
}



?>
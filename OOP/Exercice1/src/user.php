<?php 



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
    
    public function getRoles(string $roles){
        $this->role = $roles;
        return $this;
    }
    
    public function getPassword (string $password){
        $this->password = $password;
        return $this;
        
    }
    public function getSalt(string $salt){
        $this->salt = $salt;
        return $this;
    }
    public function getUsername(string $username){
        $this->username = $username;
        return $this;
    }
    
    //eraseCredentials	Erase stored salt and password data
    public function __destruct($salt){
       $this->salt;
        fclose($this);
    }
    
    
    
}



?>
<?php 


class person{
    
    private $id;
    protected $firstname;
    protected $lastname;
    protected $emails = [];
    
    
    function getId(){
        return $id;
    }
    function getFirstname(){
        return $firstname;
    }
    function getLastname(){
        return $lastname;
    }
    function getEmails(){
        return $emails;
    }
    protected function setFirstname (string $firstname){
        $this->firstname = $firstname;
        return $this;
    }
    protected function setLastname (string $lastname){
        $this->lastname = $lastname;
        return $this;
    }
    protected function setEmails (string $emails){
        $this->emails = $emails;
        return $this;
    }
}

?>
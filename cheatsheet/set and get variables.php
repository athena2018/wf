<?php 
//the below function receives an argument to set the property of fistname to the given argument and returns the current 
//object

// the keyword this, is used to refer to the current object beacause it is an object in PHP

// the way to acces a property of an object is to use ->

// the general term used for this kind of method ( a method that sets property) is a setter method

// set an get variables

public function setFirstname ($firstname){

		$this ->firstname = $firstname;
		return $this;

		
//the is a setter method, its job is to return a property, in this case the firstname
// it doesn't receive any argument because, it returns a property
		public function getFirstname(){
		
		return $this->firstname
		} 
		
		
?>
		
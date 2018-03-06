<?php 

// how method are written in interface

// we create an interface, we are going to use across some classes we create
//the  classes will implement (=create the corp) the UserInterface into them

//the concrete (=mandatory to implementing ) classes will have to implement 
//( if their parent has not already done so, in which case the concrete class would inherit those methods)
//the public method getId(); 
//and the public method setRoles (array $roles) has to be an array


// the aim in creating an interface = define a common behaviour for the classes that implement it
// creates a contract that garantees the implementing classes.


interface UserInterface{
    
    public function getId();
    public function setRoles(array $roles);
}



?>
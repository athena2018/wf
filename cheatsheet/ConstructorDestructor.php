<?php 

// what are constructor and destructor

// constructor = a function in a class, used to set its properties, when we instantiate this class to create an 
//object those properties get initialized 

//the properties can be set/initialized both with the use of the parameter or without.

//Destructor = also a function in class that's use in order to unset the properties of an object once the runtime is 
// completed or finished

private $firstname;
protected $lastname;



class Student {
    private $firstname;
    protected $lastname;

    public function_construct($firstname = "Ivan", $lastname = "Mendoza"){
        $this->firstname=$firstname;
        $this->lastname = $lastname;
    }
}


$ivan = new Student();
$sam = new Student ("Sam","Courtois");




?>
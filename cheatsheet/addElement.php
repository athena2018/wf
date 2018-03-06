<?php 
 // how to update an array with new values
 


// Role object, argument = $role
// $roles is an array, is a variable inside this object

public function addRole(Role $role){
    
    if (!in_array($role, $this->roles)){     //if not in an array
        array_push($this->roles, $role);    //add a the role at the end of the array
    }
    
    //this->roles[] = $role;
    
    return $this;
    
             
}
?>
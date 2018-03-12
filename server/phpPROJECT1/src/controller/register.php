
<?php 
// 10- create the init file and load it here
// include_once __DIR__.'init.php';



// 2- need a request method with the superglobal server before creating the session register
//when information form are submitted

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
//  3- store the html inputs into variables before send it to the database   
    $username= $_POST['username']?? null;
    $firstname=$_POST['firstname']?? null;
    $lastname=$_POST['lastname']?? null;
    $password=$_POST['password']?? null;
    
// 5- validation of the data inputs for having the rigth input into the database
    $usernameError = !(strlen($username)< 5 && is_string($username));
    $firstnameError = !(strlen($firstname)<4 && is_string($firstname));
    $lastnameError = !(strlen($lastname)<4 && is_string($lastname));
    $passwordError = !(strlen($password)<5 && is_int($password)); 
    
    
    echo "Thank You for your information";

//8- in case of valid input datas, we have to try a connexion with the database
    if(!$usernameError && $firstnameError && $lastnameError && $passwordError){
        
//9- Have to create a new file for the connexion configuration, at the same time create the database with all the user inputs + the appconfig.php + the DBConnector.php        

// ask the connexion to the DBConnector       
        try {$connection=service\DBConnector::getConnection;
        } catch (PDOException $Exception) {
            http_response_code(500);
            echo "An error occured, Please try again";
            exit(1);
        }
//18- store the input datas into the database
// must escape the db values, for entering them as strings for having a safer db
        $sql = 'INSERT INTO user (username, firstname, lastname, password) VALUES( "$username", "$firstname", "$lastname", "$password")';
 // we must make an execution of putting data inmysql       
        $affected = $connection->exec($sql);
        
        if (!$affected) {
            echo implode(', ', $connection->errorInfo());
            return;
        }
        $id = $connection->lastInsertId();
        
        echo "validation data";
        return;
        
        
        
    }
    
    

        
    



}
// 7- we cannot validate the data inputs of the user
else{
    echo "Please try again";
}




?>
<!DOCTYPE html>

<html>

	<head>
		<meta charset = "utf-8">
			<title>Web Application Project</title>
		<style>
		  body{ background-color:#D1D5F0;}
		  
		</style>	
	</head>
	
	<body>
	
<!-- 1- step create the html form for registration -->	
		<form action="register.php" method="post">
		
<!-- 4- we can display for the user the inputs in using htmlentities() for more security  -->
			<label>Registration</label>
			<br>
			<input id="username" type="text" name="username" value=<?php  //echo htmlentities($username)?>>
			<br>
			
<!--  6- Display an error message in case of wrong input required -->
<?php 
if(!($usernameError ?? true)){
    echo "Please enter a valid Username";
}
?>			<label>Your Firstname</label>
			<input id="firstname" type="text" name="firstname" value=<?php // echo htmlentities($firstname)?>>
			<br>
<?php 
if(!($firstnameError ?? true)){
echo "Please enter a valid Firstname";
}
?>			
			
			<label>Your Lastname</label>
			<input id="lastname" type="text" name="lastname" value=<?php //echo htmlentities($lastname)?>>
			<br>
<?php 
if(!($lastnameError?? true)){
echo "Please enter a valid lastname";
}?>			

			<label>Your password</label>
			<input id="password" type="password" name="password" placeholder="">
<!-- We do not display the password by htmlentities() for more security for the user -->
			<br>
<?php 
if(!($passwordError?? true)){
echo "Please try again your password";
}?>			


			<input type="submit" placeholder="register">
		
		</form>
	</body>
</html>	

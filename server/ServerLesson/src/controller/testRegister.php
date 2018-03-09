<?php 
// need the init for the connexion
include_once __DIR__.'/init.php';
// needed for the request method = POST
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    
    
//store the html input as variable for the post request    
    $username = $_POST ['username'] ?? null;
    $password_1 = $_POST ['password_1'] ?? null;
    $password_2 = $_POST ['password_2']?? null;
    $phonenumber = $_POST ['phonenumber'] ?? null;
    
    echo 'Validate data' . "<br/>";
    echo 'If validation fail' . "<br/>";
    
    
  // use conditions for the different inputs of the formular as success or errors
  
// two writing possibilities - hard mode    
    $usernameError = !(is_string($username) && strlen($username) > 2);
    $passwordError = !($password_1 === $password_2 && strlen($password_1) > 7 );
    $phonenumberError = !( is_numeric($phonenumber) && strlen($phonenumber) > 9);
    
    
// easy mode writing more lines of code    
    // if (is_string($username) && strlen($username) > 2){
    // echo "username ok" . "<br/>";
    //}
    
    // if ($password_1 === $password_2 && strlen($password_1) > 7){
    //  echo "thank you". "<br/>";
    //}
    
    
 //needed for formular validation inputs   
    if (!($usernameError || $passwordError || $phonenumberError)){
 //use try and catch to go throw the error as exceptions       
        try{
        // Use the PDO to make the connexion with the database mysql 
// don't need to create a PDO
// we must ask the connexion to the DBConnector
            $connexion = Service\DBConnector::getConnection;
        }catch (PDOException $exception){
                http_response_code(500);
                echo 'a problem occured, contact support';
                exit(1);
            }
            
// we make a query to insert into the database the informations input
//we have to make a secure sql query
            $sql = "INSERT INTO user (username, password) VALUES(\"$username\", \"$password\")";
            echo 'store data';
            return;
    }else{
        echo 'fatal error';
    }
    
    
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>My title here</title>
		
	</head>
	<body>
	
        <?php
        
        //secure the query ?? we want the id a try a connection
            $displayAccountId = $_GET['id'] ?? null;
//filter the information  
//first condition error
            if (! $displayAccountId || !is_numeric($displayAccountId)) {
            ?>
                <div>
                    <p>To be displayed, this page need a valid numeric id as query string parameter </p>
                </div>
			<?php 
			
            }else {
//case of success, ask to the db connector for the connexion                
            }
                try {
                    $connection = Service\DBConnector::getConnection();
             
 // go trow the excpetion                   
                } catch (PDOException $exception){
                    http_response_code(500);
                    echo (string)$exception;
                    return;
                }
//store the data into the database                               
                $sql = "SELECT username, password FROM user WHERE id= " . $displayAccountId;
                $result = $connection->query($sql);
                //case of fetchAll kind of check
                $allresults = $result->fetchAll();
               
                if (empty($allResults)){  
                
                ?>
                <div>
                	<p>To be displayed, this page need a valid numeric id as query string parameter</p>
                </div>
                <?php 
    	return;
            }
    
    foreach ($allResults as $aLine) {
        ?>
    	<div>
    		<p>Username : <?php echo $aLine['username']; ?></p>
    		<p>Password : <?php echo $aLine['password']; ?></p>
    	</div>
    	<?php 
    }
    
    // Case of fetch
    // while ( ($aLine = $results->fetch()) !== false ){
    //     $aLine['username'];
    //     $aLine['password'];
    // }
                
                
			?>
			
		<form action="testRegister.php" method = "POST">

			<?php  if(!($usernameError ?? true)){?>
			<div>
				<p> You have an error into your username </p>
			</div>
			<?php }?>
			<label for="username">Your Username : </label>
			<input type="text" name = "username" value= "<?php  echo htmlentities ($username?? ""); ?>"/>
			
			<br/>
			
			<?php  if (!($passwordError ?? true)){?>
			<div>
				<p> You have an error into your password </p>			
			</div>
			<?php }?>
			
			
			<label for="password_1">Your password : </label>
			<input type="password" name="password_1"/>
			
			<br>
			
			<label for="password_2">Retype your password</label>
			<input type="password" name="password_2"/>
			
			<br/>
			
			<label for="phonenumber">Your phone number</label>
			<input type="text" name="phonenumber" value ="<?php  echo htmlentities ($phonenumber?? ""); ?> "/>
			
			<br/>
			<?php  if (!($phonenumberError ?? true)){?>
			<div>
				<p> Your phone number is incorrect</p>
			</div>
			<?php }?>
			<button type="submit">validation</button>
			
			
			
		</form>
	</body>
</html>	

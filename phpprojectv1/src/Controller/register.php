<?php
// have to create first send the input to the account.php

include_once __DIR__.'/init.php';

//must make a use for the dbconnector
use Service\DBConnector;



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? null;
    $firstname = $_POST['firstname']?? null;
    $lastname = $_POST['lastname']?? null;
    $email = $_POST['email']?? null;
    $password=$_POST['password']?? null;
    
    $usernameSuccess= strlen($username)<5;
    $firstnameSuccess=strlen($firstname)<10;
    $lastnameSuccess=strlen($lastname)<10;
    $emailSuccess=strlen($email)<20;
    $passwordSuccess=strlen($password)>5;
    
    if ($usernameSuccess || $emailSuccess || $passwordSuccess ) {
        try {
            $connection = Service\DBConnector::getConnection();
        } catch (PDOException $exception) {
            http_response_code(500);
            echo 'A problem occured, contact support';
            exit(10);
        }
        
        $sql = "INSERT INTO user( name, firstname, lastname,email, password) VALUES ( \"$username\",\"$firstname\", \"$lastname\", \"$email\" \"$password\")";
        $affected = $connection->exec($sql);
        
        if (!$affected) {
            echo implode(', ', $connection->errorInfo());
            return;
        }
        $id = $connection->lastInsertId();
        
        echo 'Store data';
        return;
    }
    
    
    
}
    
?>





<!DOCTYPE html>
    <html>
        <head>
        	<meta charset="utf8">
        	<link rel="stylesheet" href="style.css">
        
        </head>
        <body>
        	<nav id="reg">
        		<div id="register">
        			<form action="account.php" method="GET">
        			<?php if (!($usernameSuccess ?? true)) {?>
    		<div>
    			<p> You have an error into your username</p>
    		</div>
    		<?php }?>
        				<input type="text" name="username" placeholder="username" required>
        				<input type ="text" name="firstname" placeholder="firstname">
        				<input type="text" name="lastname" placeholder="lastname">
        				<input type="email" name="email" placeholder="Your e-mail" required>
        				<input type="password" name="password" placeholder="your password" required>
        				<button type="submit">Submit</button>
        			</form>
        		</div>
        	</nav>
        	<header>
        		<div id="Log">
        			<form action="log.php">
        				<input type="text" name = "login" placeholder="logIn">
        				<button type="submit">Log In</button>
        			
        			</form>
        			
        		</div>
        	
        	</header>
        	<section></section>
        	<article> HOME PAGE</article>
        </body>
    
    </html>
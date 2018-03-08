<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    



    $username = $_POST ['username'] ?? null;
    $password_1 = $_POST ['password_1'] ?? null;
    $password_2 = $_POST ['password_2']?? null;
    
    echo 'Validate data' . "<br/>";
    echo 'If validation fail' . "<br/>";
    
    $usernameSuccess = (is_string($username) && strlen($username) > 2);
    $passwordSucess = ($password_1 === $password_2 && strlen($password_1) >7 );

   // if (is_string($username) && strlen($username) > 2){
       // echo "username ok" . "<br/>";
    //}
    
   // if ($password_1 === $password_2 && strlen($password_1) > 7){
      //  echo "thank you". "<br/>";
    //}
    
    if ($usernameSuccess && $passwordSuccess){
        echo "store data";
        return;
    }
    
 
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset ="UTF-8">
		<title>My title here</title>
	</head>
	<body>
		<form action="/register.php" method = "POST">
			<?php  if(!($usernameSuccess ?? true)){?>
			<div>
				<p> You have an error into your username </p>
			</div>
			<?php }?>
			<label for="username">Your Username : </label>
			<input type="text" name = "username" value= "<?php  echo htmlentities ($username?? "") ?>"/>
			
			<br/>
			
			<?php  if (!($passwordSucess ?? true)){?>
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
			
			<button type="submit">validation</button>
			
			
			
		</form>
	
	
	
	</body>
</html>

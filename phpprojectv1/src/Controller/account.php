
<?php 
//receive the information and send it to the database

include_once __DIR__.'/init.php';
use Service\DBConnector;


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>My title here</title>
    </head>
    <body>
<?php
$username = $_GET['username'] ?? null;
$firstname = $_GET['firstname']?? null;
$lastname = $_GET['lastname']?? null;
$email = $_GET['email']?? null;
$password=$_GET['password']?? null;

$displayAccountUsername = $_GET['username'] ?? null;

if (!$displayAccountUsername) {
    ?>
    	<div>
    		<p>To be displayed, this page need a valid username as query string parameter</p>
    	</div>
    <?php 
} else {
    try {
        $connection = Service\DBConnector::getConnection();
    } catch (PDOException $exception) {
        http_response_code(500);
        echo 'A problem occured, contact support';
        exit(1);
    }
    
    $sql = "INSERT INTO user( name, firstname, lastname,email) VALUES ( \"$username\",\"$firstname\", \"$lastname\", \"$email\" \"$password\")";
    $affected = $connection->exec($sql);
    
    if (!$affected) {
        echo implode(', ', $connection->errorInfo());
        return;
    }
    $id = $connection->lastInsertId();
    
    echo 'Store data';
    return;

    $sql = 'SELECT * FROM user WHERE user = :username';
    $statement = $connection->prepare($sql);
    
    $statement->bindParam('username', $displayAccountUsername, PDO::PARAM_STR);
    
    $statement->execute();
    
    // case of fetchAll
    $allResults = $statement->fetchAll();
    if (empty($allResults)) {
        ?>
    	<div>
    		<p>To be displayed, this page need a valid username as query string parameter</p>
    	</div>
    	<?php 
    	return;
    }
    
    foreach ($allResults as $aLine) {
        ?>
    	<div>
    		<p>Id : <?php echo $aLine['id']; ?></p>
    		<p>Username : <?php echo $aLine['username']; ?></p>
    		<p>Firstname : <?php echo $aLine['firstname']; ?></p>
    		<p>Lastname : <?php echo $aLine['lastname']; ?></p>
    		<p>E-mail : <?php echo $aLine['email']; ?></p>
    		<p>Password : <?php echo $aLine['password']; ?></p>
    	</div>
    	<?php 
    }
    
    // Case of fetch
    // while ( ($aLine = $results->fetch()) !== false ){
    //     $aLine['username'];
    //     $aLine['password'];
    // }
}
?>
    </body>
</html>


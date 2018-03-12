<?php include_once __DIR__.'/init.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>My title here</title>
    </head>
    <body>
<?php
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

    $sql = 'SELECT * FROM user WHERE username = :username';
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


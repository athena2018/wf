<?php
namespace src;
include_once __DIR__.'/init.php';
// call the dbconnector
require Service/DBConnector.php 

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>My title here</title>
    </head>
    <body>
<?php
//get the account data by the get request
$displayAccountId = $_GET['id'] ?? null;

//in case of success make a connexion to the database
//must filter the data to sure to have the right one
//first possibility, the condition is false, message error apperead
if (!$displayAccountId || !is_numeric($displayAccountId)) {
    ?>
    	<div>
    		<p>To be displayed, this page need a valid numeric id as query string parameter</p>
    	</div>
    <?php 
//connexion to the database with the exception case  
} else {
 // try first the connexion to the database   
    try {
 // don't need to create a new PDO, because of the DBConnectore who store the classes       
        $connection = Service\DBConnector::getConnection;
//catch the error, display the message error        
        } catch (PDOException $exception) {
        http_response_code(500);
        echo 'A problem occured, contact support';
        exit(1);
        }
 //in case of success,we store the information in the database
    $sql = "SELECT username, password FROM user WHERE id = ".$displayAccountId;
    $results = $connection->query($sql);
    
    // case of fetchAll
    $allResults = $results->fetchAll();
    if (empty($allResults)) {
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
    //create the sql with the placeholder
    // the double dot are internal to PDO
    $sql = 'SELECT * FROM user WHERE username = :username';
    
 // prepare the query   
    $statement = $connection->prepare($sql);
  // add parameter the statement 
  //
    $statement->bindParam('username', $displayAccountusername);
    
  // the bind parameter excepts a string 
  // the parameter must be stored in a variable
  $parameter = 'hello world';
  //we must specifiy the second parameter as an integer for the id
  
    $statement->bindParam(2,$parameter, PDO::PARAM_STR);
    
    $statement->execute();
    
    $allResults = $statement-> fetchAll;
    
    // Case of fetch
    // while ( ($aLine = $results->fetch()) !== false ){
    //     $aLine['username'];
    //     $aLine['password'];
    // }
}
?>

<?php 
//get the id + if the id is not given or not numeric display an error /  / if fails display the dberror
    $displayAccount = (!$displayAccount || !is_numeric($displayAccountId));
    if ($displayAccount === true){
        echo 'error occured';
        //if valid id try a new connection on the db
    }else
        try {
  // ask the connexion to the db connector      
            $connection = Service/DBConnector::getConnection();
    }catch (PDOException $exception){
        http_response_code(500);
        
    } return;


//create the sql query / execute the query + get the result= an object


// fetch all results on this opbject
//check if we have line on the result
//if lines on the result = display username + password

?>
    </body>
</html>

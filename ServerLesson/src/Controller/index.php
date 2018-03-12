<?php 
$currentTimeSlot = (new DateTime())->format('H');

if ($currentTimeSlot < 12) {
    $toDisplay = 'Good morning';
} else if ($currentTimeSlot < 18) {
    $toDisplay = 'Good afternoon';
} else if ($currentTimeSlot < 22) {
    $toDisplay = 'Good evening';
} else {
    $toDisplay = 'Please, sleep';
}

$range = range(1, 10);

$firstname = $_GET['firstname'] ?? 'John';
$firstname = htmlentities($firstname);

$lastname = $_GET['lastname'] ?? 'Doe';
$lastname = htmlentities($lastname);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>My title here</title>
    </head>
    <body>
    	Hello <?php echo $firstname . ' ' . $lastname;?>, <?php echo $toDisplay; ?>
    	<br/>
    	
    	<ul>
    		<?php foreach ($range as $element) {?>
    		    <li><?php echo $element; ?></li>
    		<?php } ?>
    	</ul>
    	<ul>
    		<?php foreach ($range as $element) {
    		  echo '<li>' . $element . '</li>';
    		} ?>
    	</ul>
    </body>
</html>

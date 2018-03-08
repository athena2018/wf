<?php 
$currentTimeSlot = (new DateTime())->format('H');

if ($currentTimeSlot < 12){
    $toDisplay = "Good Morning";
} else if ($currentTimeSlot < 18){
    $toDisplay = "Good Afternoon";
} else if ($currentTimeSlot < 22){
    $toDisplay = "Good Evening";
} else ($currentTimeSlot > 22){
    $toDisplay = "Please Sleep"
}
?>
<?php 
$range = range(0,10);
$firstname = $_GET['firstname'] ?? 'John';
$firstname = htmlentities($firstname);
$lastname = $_GET ['lastname'] ?? 'Doe';
$lastname = htmlentities($lastname);

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>My title here</title>
	</head>
	<body>
	
		Hello world my name is <?php echo $firstname . ' ' . $lastname; ?>, <?php echo $toDisplay; ?>
		<ul>
			<?php foreach($range as $element){
			echo '<li>' . $element . '</li>';
			} ?>
		</ul>
		<ul>
			<?php foreach($range as $element){
			    
			?>
			<li><?php  echo $element;?></li><?php } ?>
			
		</ul>

		
	</body>


</html> 


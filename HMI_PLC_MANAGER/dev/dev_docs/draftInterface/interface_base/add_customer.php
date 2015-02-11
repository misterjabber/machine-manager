<?php
include "../model/QTMIBaseClass.php"; 
include "../model/Customer.php"; 
include "../model/FusionPlc.php"; 

// initilaze DB connection
$dbLink = mysql_connect('localhost', 'warren', 'usnusn');
if(!$dbLink){
	die('Could not connect: '. mysql_error());
}	


$obj = new Customer($dbLink);
$obj->populateObj();
echo $obj->lookup_Id;

$obj2 = new FusionPlc($dbLink);
$obj2->populateObj();
echo $obj2->lookup_Id;


// close DB connection
mysql_close($dbLink);
?>

<H2>Add Customer</H2></br>
<a href="homepage.php">Home Page</a> </br>
</br>
Name</br>
Has HC</br>
Has Fusion</br>
<b>Add</b></br>


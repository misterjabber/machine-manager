<?php
include "../model/QTMIBaseClass.php"; 
include "../model/SystemRev.php"; 

// initilaze DB connection
$dbLink = mysql_connect('localhost', 'warren', 'usnusn');
if(!$dbLink){
	die('Could not connect: '. mysql_error());
}	


$systemRev = new SystemRev($dbLink);
$systemRev->machine = "FUSION";
$systemRev->code_base = "PLC";
$systemRev->populateObj();


// close DB connection
mysql_close($dbLink);
?>


<H2>Fusion Plc</H2></br>
<a href="homepage.php">Home Page</a> </br>
</br>

Next Full Version Number: <?php echo $systemRev->full_rev; ?></br>
Next Incremental Version Number: <?php echo $systemRev->inc_rev; ?></br>
Upload File</br>
Description of Changes</br>
Incremental release / Full Release</br>
<b>ADD</b></br>
</br>
Version</br>
Upload Date</br>
Filename</br>
Description of Changes</br>
</br>
Version</br>
Upload Date</br>
Filename</br>
Description of Changes</br>
</br>
Version</br>
Upload Date</br>
Filename</br>
Description of Changes</br>
</br>
Version</br>
Upload Date</br>
Filename</br>
Description of Changes</br>

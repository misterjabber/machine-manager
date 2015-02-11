<?php

$mysqli = new mysqli("localhost", "sec_qtmi", "wJi2Klo3Bqlks098HM", "secure_login");
if($mysqli->connect_error){
	echo "no workey";
}else{
	echo "workey";
}

?>
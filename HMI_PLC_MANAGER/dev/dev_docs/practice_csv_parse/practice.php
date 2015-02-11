<?php

function csv_to_array($filename='', $delimiter=',')
{

if(!file_exists($filename)) echo "filename - ".$filename;

    if(!file_exists($filename) || !is_readable($filename))
        return FALSE;

    $header = NULL;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== FALSE)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
        {
            if(!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }
    return $data;
}

$csv_array = csv_to_array('./csv/errors.csv');

$insert_date = "";
$insert_time = "";
$insert_description = "";

foreach ($csv_array as &$value) {
    $insert_date = $value['Date'];
    $insert_time = $value['Time'];    
    $insert_description = $value['Description'];    
    
    echo $value['Date']."</br>";
    echo $value['Time']."</br>";
    echo $value['Description']."</br>";
}


$dbLink = mysql_connect('localhost', 'warren', 'usnusn');
if(!$dbLink){
	die('Could not connect: '. mysql_error());
}


$query = sprintf("INSERT INTO `hmi_plc_mgr`.`customer_machine_error` (
	`id` ,
	`created_on_date` ,
	`created_on_time` ,
	`description` 
	)
	VALUES (
	NULL , '%s', '%s', '%s'
	);", 
	mysql_real_escape_string($insert_date), 
	mysql_real_escape_string($insert_time), 
	mysql_real_escape_string($insert_description));
	//	echo $query;
mysql_query($query);




//echo "hi";
//print_r($csv_array);


?>
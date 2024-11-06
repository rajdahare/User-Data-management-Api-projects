<?php

include('../connect.php');

$filename = "database_backup.sql";

$fp = fopen('php://output','w');

//get all the tables
$tables = array();
$result = mysqli_query($connect,"SHOW TABLES");
while($row=mysqli_fetch_row($result)){
    $tables[]=$row[0];
}

//loop through each table and get the data
foreach($tables as $table){
    //get the table structure
    $result = mysqli_query($connect,"SHOW CREATE TABLE $table");
    $row = mysqli_fetch_row($result);
    $create_table = $row[1];
    fwrite($fp,$create_table . ";\n\n");

    //get the table data
    $result = mysqli_query($connect,"SELECT * FROM $table");
    while($row = mysqli_fetch_row($result)){
        $values = array();
        foreach($row as $value){
            $values[] = "'" . mysqli_real_escape_string($connect,$value) . "'";
        }
        fwrite($fp,"INSERT INTO $table VALUES(" . implode(",", $values) . ");\n");
    }
    fwrite($fp, "\n\n");
}

fclose($fp);
header("Content-type: text/sql");
header("Content-Disposition: attachment; filename=$filename");
exit;


?>
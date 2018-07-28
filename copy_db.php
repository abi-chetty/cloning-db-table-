<?php
//db1-the source database
$db1=mysqli_connect(/**"servername"**/,/**"username"**/,/**"password"**/,/**"database"**/);
//db2-the destination database
$db2=mysqli_connect(/**"servername"**/,/**"username"**/,/**"password"**/,/**"database"**/);


$table=/*"tablename"*/;

$tableinfo = mysqli_fetch_array(mysqli_query($con1,"SHOW CREATE TABLE $table  "));
mysqli_query($db2," $tableinfo[1]");

// select all content
$result = mysqli_query($db1,"SELECT * FROM $table  "); 
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
       mysqli_query($db2,"INSERT INTO $table (".implode(',',array_keys($row)).") VALUES ('".implode("', '",array_values($row))."')"); // insert one row into new table
    }
?>
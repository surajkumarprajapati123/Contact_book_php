<?php

function db_conn(){
    $host = 'localhost';
    $dbuser='root';
    $dbpass='';
    $dbName = 'contactapp';
    $conn = mysqli_connect($host,$dbuser,$dbpass,$dbName) or die('DB, Connection ERROr:'.mysqli_connect_error());
    return $conn;
}

 function db_close($conn)
 {
    mysqli_close($conn);
 }
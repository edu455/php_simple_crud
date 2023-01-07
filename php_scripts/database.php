<?php
    const db_host='localhost';
    const db_username='root';
    const db_password='';
    const db_name='employee';
    $conn=mysqli_connect(db_host,db_username,db_password,db_name);
    if($conn->errno){
        die("Database connection failed: ".$conn->errno);
    }
?>
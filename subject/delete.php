<?php

require "../class/db.php";
session_start();
if(isAdminLoggedIn());

$id = $_GET['id'];

$sql = "Delete from tbl_subject where subid=$id";

if($db->query($sql) == TRUE)
{
    echo"alert('Subject successfully deleted!')";
    header("location: index.php");
}




?>
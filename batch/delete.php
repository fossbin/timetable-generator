<?php

require "../class/db.php";
session_start();

if(isAdminLoggedIn());

$id = $_GET['id'];

$sql = "Delete from tbl_batch where bid=$id";

if($db->query($sql) == TRUE)
{
    echo"alert('Batch successfully deleted!')";
    header("location: index.php");
}




?>
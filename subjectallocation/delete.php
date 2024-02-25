<?php

require "../class/db.php";
session_start();

if(isAdminLoggedIn());

$id = $_GET['id'];

$sql = "Delete from tbl_allocation where sid=$id";

if($db->query($sql) == TRUE)
{
    echo"alert('Allocation successfully deleted!')";
    header("location: index.php");
}




?>
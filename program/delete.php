<?php

require "../class/db.php";
session_start();

if(isAdminLoggedIn());

$id = $_GET['id'];

$sql = "Delete from tbl_program where pid=$id";

if($db->query($sql) == TRUE)
{
    echo"alert('Program successfully deleted!')";
    header("location: index.php");
}




?>
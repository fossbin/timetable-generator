<?php

require "../class/db.php";
session_start();

if(isAdminLoggedIn());

$id = $_GET['id'];

$sql = "Delete from tbl_semester where semid=$id";

if($db->query($sql) == TRUE)
{
    echo"alert('Semester successfully deleted!')";
    header("location: index.php");
}




?>
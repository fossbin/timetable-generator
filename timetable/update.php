<?php
require "../class/db.php";
session_start();
if(isAdminLoggedIn());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected option from the form
    $cellId=$_POST['timetableId']; 
    $facultyId=$_POST['faculty'];
    $sql = "update tbl_timetable set fid ='$facultyId' where id ='$cellId'";
    //$sql2 = "update tbl_timetable set"
    if ($db->query($sql)==true) {
        header("Location: display.php");
        exit;
    } else {
        echo "Update failed: " . $db->error;
    }
}
?>
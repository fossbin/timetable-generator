<?php
require "../class/db.php";
session_start();
if(isAdminLoggedIn());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected option from the form
    $cellId=$_POST['timetableId']; 
    $facultyId=$_POST['faculty'];
    $sql="select bid from tbl_timetable where id='$cellId'";
    $result=$db->query($sql);
    while($bid=$result->fetch_assoc())
    $sql1 = "update tbl_timetable set fid ='$facultyId' where id ='$cellId'";
    $sql2 = "update tbl_timetable set subid=(select subid from tbl_allocation where fid='$facultyId' and bid='$bid' LIMIT 1) where id='$cellId'";
    if (($db->query($sql1)==true) && ($db->query($sql2)==true)) {
        header("Location: display.php");
        exit;
    } else {
        echo "Update failed: " . $db->error;
    }
}
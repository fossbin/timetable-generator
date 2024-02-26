<?php
require "../class/db.php";
session_start();
if(isAdminLoggedIn());

$result = $db->query("SELECT * FROM tbl_timetable");

//Serialize the data
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
$serialized_data = serialize($data); 

//Inserting data into storage
$stored_date = date('Y-m-d H:i:s'); //Present Date Time 
$query = "INSERT INTO tbl_storage (stored_date, tbl_timetable_data) VALUES ('$stored_date', '$serialized_data')";
if($db->query($query)==true){
    echo "<script>alert('Timetable Successfully Saved'); window.location.href = 'display.php';</script>";
    //header("Location: display.php");
    exit;
} else {
    echo "Save Error" . $db->error;
}

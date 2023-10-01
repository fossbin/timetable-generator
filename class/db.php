<?php
$db = new mysqli("localhost","root","","timetable");
if($db->connect_error){
    echo"Please Come Back Later";
}

function isAdminLoggedIn(){
    if(isset($_SESSION['adminid']))
        return true;
    else {
        header("Location:../login.php");
        exit();
    }
}
?>
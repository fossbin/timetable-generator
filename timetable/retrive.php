<?php
require "../class/db.php";
session_start();
if(isAdminLoggedIn());

if(isset($_POST['timetableId'])){
    $selectedId=$_POST['timetableId'];
    $sql="select * from tbl_storage where id=$selectedId";
    $result=$db->query($sql);
    if($result){
        $data;
        while($row=$result->fetch_assoc()){
            //Unserializing tbl_timetable data and adding to data variable instead of array
            $data=unserialize($row['tbl_timetable_data']);
        }
    $jsonData = json_encode($data);

    //Storing JSON data in a session variable
    $_SESSION['timetableData'] = $jsonData;
    //Redirect to history.php
    header("Location: history.php");

    } else {
        echo "Query Error ". $db->error;
    }
} else {
    echo "No Date Selected";
}


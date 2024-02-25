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
    echo json_encode($data);
    } else {
        echo "Query Error ". $db->error;
    }
} else {
    echo "No Date Selected";
}


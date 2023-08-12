<?php
echo "hi";

require "../class/db.php";

session_start();

if(isset($_SESSION['adminid']))
{
    //no need to do anything
}
else{
    header("location: ../login.php");
}


$sql_currentfaculty="Select fid from tbl_timetable where day!='Monday' and hour=1 and bid=5 UNION 
                    Select fid from tbl_timetable where day='Monday' and hour=1 and bid!=5"; 
$currentfaculty = $db->query($sql_currentfaculty);

if($currentfaculty->num_rows>0)
{
    while($currentfaculty_row=$currentfaculty->fetch_assoc())
    {
        echo $currentfaculty_row['fid'];
        // else continue loop
    }
}
?>
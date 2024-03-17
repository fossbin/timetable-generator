<?php
require "../class/db.php";
session_start();

if(isAdminLoggedIn());

if(!empty($_POST["subid"]))
{
    $subid = $_POST["subid"];

    // Query to fetch faculty list not allocated to the selected semester
    $sql_faculty = "SELECT * FROM tbl_faculty WHERE fid NOT IN (SELECT fid FROM tbl_allocation WHERE subid = $subid)";
    
    $result_faculty = $db->query($sql_faculty);

    if ($result_faculty->num_rows > 0) {
        while ($faculty_row = $result_faculty->fetch_assoc()) {
            echo "<option value='" . $faculty_row['fid'] . "'>" . $faculty_row['fName'] . "</option>";
        }
    } else {
        echo "<option value=''>No Faculty Available</option>";
    }
} else {
    echo "<option value=''>Invalid Request</option>";
}
?>

<?php
// Include your database connection file
require "../class/db.php";
session_start();
if(isAdminLoggedIn());
if (isset($_POST['cellId'])) {
    // Sanitize input values
    $cellId = mysqli_real_escape_string($db, $_POST['cellId']);
    $cellId = intval($_POST['cellId']);
    $day = mysqli_real_escape_string($db, $_POST['day']);
    $day = intval($_POST['day']);
    $hour = mysqli_real_escape_string($db, $_POST['hour']);
    $hour = intval($_POST['hour']);
    
    $workingDays = array("1" => "Monday","2" => "Tuesday","3" => "Wednesday","4" => "Thursday","5" => "Friday","6" => "Saturday");

    $bidSql="SELECT bid FROM tbl_timetable WHERE id = $cellId";
    $bidResult=$db->query($bidSql);

    // Check if there are results
    if ($bidResult && $bidRow = $bidResult->fetch_assoc()) {
        // Extract bid from the result
        $bid = $bidRow['bid'];
        $sql = "SELECT * FROM tbl_faculty WHERE fid IN (SELECT fid FROM tbl_allocation WHERE bid=$bid) and fid in (Select fid from tbl_timetable where day='$workingDays[$day]' and hour=$hour and bid!=$bid)";
        var_dump($sql);
        $result = $db->query($sql);
        var_dump($result);
        // Check if there are results
        if ($result->num_rows>0) {
            // Output data as options for the dropdown
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['fid'] . "'>" . $row['fName'] . "</option>";
            }
            
        } else {
            // If no faculty found, you can handle it accordingly
            echo '<option value="">No Faculty Available</option>';
        }
    }
} else {
        // If any required parameter is not set, handle the error
        echo '<option value="">Error: Missing Data</option>';
}

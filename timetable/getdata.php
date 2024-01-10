<?php
// Include your database connection file
require "../class/db.php";

if (isset($_POST['cellId'])) {
    // Sanitize input values
    $cellId = mysqli_real_escape_string($db, $_POST['cellId']);
    $bidSql="SELECT bid FROM tbl_timetable WHERE id = $cellId";
    $bidResult=$db->query($bidSql);

    if ($bidResult === false) {
        // If there is an error, handle it and exit
        echo '<option value="">Error executing bid query: ' . mysqli_error($db) . '</option>';
        exit();
    }
    // Check if there are results
    //if ($bidResult && $bidRow = $bidResult->fetch_assoc()) {
        // Extract bid from the result
        //$bid = $bidRow['bid'];

    
        $sql = "SELECT * FROM tbl_faculty WHERE fid IN (SELECT fid FROM tbl_allocation WHERE bid in(select bid from tbl_timetable where bid=5))";
        $result = $db->query($sql);
        // Check if there are results
        if ($result) {
            // Output data as options for the dropdown
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['fid'] . "'>" . $row['fName'] . "</option>";
            }
            
            // Send the generated options back to the JavaScript
            echo $options;
        } else {
            // If no faculty found, you can handle it accordingly
            echo '<option value="">No Faculty Found</option>';
        }
  //  }
} else {
        // If any required parameter is not set, handle the error
        echo '<option value="">Error: Missing Data</option>';
}
?>
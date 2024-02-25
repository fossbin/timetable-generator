<?php
require "../class/db.php";
session_start();
if(isAdminLoggedIn());
// Check if data is sent via POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'timetableData' key exists in the POST data
    if(isset($_POST['timetableData'])) {
        // Decode the JSON string into a PHP associative array
        $timetableData = json_decode($_POST['timetableData'], true);

        // Check if decoding was successful
        if ($timetableData !== null) {
            // Here, you can process the PHP array as needed
            // For example, you can perform database operations, calculations, etc.

            // Once processing is done, you can send a response back to the main file
            // For demonstration, let's send a success message back
            $response = array('status' => 'success', 'message' => 'Data received and decoded successfully.');

            // Encode the response array into JSON format
            $jsonResponse = json_encode($response);

            // Send the JSON response back to the main file
            echo $jsonResponse;
        } else {
            // Error handling if decoding fails
            $response = array('status' => 'error', 'message' => 'Failed to decode JSON data.');
            echo json_encode($response);
        }
    } else {
        // Error handling if 'timetableData' key is not present in the POST data
        $response = array('status' => 'error', 'message' => 'No data received.');
        echo json_encode($response);
    }
} else {
    // Error handling if the request method is not POST
    $response = array('status' => 'error', 'message' => 'Invalid request method.');
    echo json_encode($response);
}
?>

<?php

// Connect to database 
$con = mysqli_connect("localhost", "root", "", "ade");

// Check if id is set or not if true toggle, 
// else simply go back to the page 
if (isset($_GET['id'])) {

    // Store the value from get to a 
    // local variable "course_id" 
    $calonsiswa_id = $_GET['id'];

    // SQL query that sets the status 
    // to 1 to indicate activation. 
    $sql = "UPDATE `calonsiswa` SET 
			`_status`= 1 WHERE id='$calonsiswa_id'";

    // Execute the query 
    mysqli_query($con, $sql);
}

// Go back to course-page.php 
header('location: datacs2.php');

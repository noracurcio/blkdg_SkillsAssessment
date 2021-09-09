<?php

/**
 * Template Name: LogIn Form
 */

get_header();
?>
<h2>Please Enter Your Log In Credentials</h2>
<form action="" method="post" autocomplete="off">
    <label for="user-firstname"> First Name
        <input type="text" name="firstName" id="user-firstname">
    </label>
    <label for="user-lastname"> Last Name
        <input type="text" name="lastName" id="user-lastname">
    </label>
    <label for="user-username"> Username
        <input type="text" name="userName" id="user-username">
    </label>

    <label for="user-password"> Password
        <input type="text" name="userPassword" id="user-password">
    </label>
    <input type="submit" name="submit" value="Submit">
</form>







<?php


//capturing variables from the form 
$firstName =  $_REQUEST['firstName'];
$lastName = $_REQUEST['lastName'];
$userName = $_REQUEST['userName'];
$password = $_REQUEST['userPassword'];
//hashes password into 32 characters
$hash_val = md5($password);


if (isset($_POST['submit'])) {
    echo 'test';
    // checking if its NOT(!) empty then post the value. Store the value of firstname into the $firstname variable. 
    // sanitize_text_field cleans inout field before we feed anything into the DB
    $firstname = (!empty($_POST['user-firstname'])) ? sanitize_text_field($_POST['user-firstname']) : '';
    $lastname = (!empty($_POST['user-lastname'])) ? sanitize_text_field($_POST['user-lastname']) : '';
    $username = (!empty($_POST['user-username'])) ? sanitize_text_field($_POST['user-username']) : '';
    $password = (!empty($_POST['user-password'])) ? sanitize_text_field($_POST['user-password']) : '';
}







// connect to database
$conn = mysqli_connect("localhost", "root", "root", "nora_db");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}




// mysql guery to insert into table - added ID
$sql = "INSERT INTO form_data  VALUES ('$firstName', 
            '$lastName', '$userName' ,'$hash_val', 0)";

//checking if the connection to the db was successful or not
if (mysqli_query($conn, $sql)) {
    echo "SUCCESS!!";
} else {
    echo "ERROR: sorry,try again $sql. "
        . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);









// default footer
get_footer();
?>
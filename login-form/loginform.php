<?php

/**
 * Template Name: LogIn Form
 */

get_header();
?>
<h1>Please Enter Your Log In Credentials</h1>
<form action="" method="post">
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





$firstName =  $_REQUEST['firstName'];
$lastName = $_REQUEST['lastName'];
$userName = $_REQUEST['userName'];
$password = $_REQUEST['userPassword'];

function hashPassword($password)
{
    $hashpass = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
    echo $hashpass;
}
var_dump($hashpass);

hashPassword($password);




// connect to database
$conn = mysqli_connect("localhost", "root", "root", "nora_db");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}




// mysql guery to insert into table
$sql = "INSERT INTO form_data  VALUES ('$firstName', 
            '$lastName', '$userName' ,'$hashpass')";

if (mysqli_query($conn, $sql)) {
    echo "SUCCESS!!!";
} else {
    echo "ERROR: sorry,try again $sql. "
        . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);




// default footer
get_footer();
?>
<?php

/**
 * Template Name: LogIn Form
 */

get_header();
?>

<body>
    <center>
        <h2 style="color:#01273C;">Please Enter Your Log In Credentials:</h2>
        <br><br><br>

        <form action="" method="post" autocomplete="off">
            <p>
                <label style="color:#01273C;" for="user-firstname"> First Name:
                    <input style="background-color:#A4B2BB" type="text" name="firstName" id="user-firstname">
                </label>
                <br><br>



                <label style="color:#01273C;" for="user-lastname"> Last Name:
                    <input style="background-color:#A4B2BB" type="text" name="lastName" id="user-lastname">
                </label>
            </p>
            <br>

            <p>
                <label style="color:#01273C;" for="user-username"> Username:
                    <input style="background-color:#A4B2BB" type="text" name="userName" id="user-username">
                </label>
                <br><br>



                <label style="color:#01273C;" for="user-password"> Password:
                    <input style="background-color:#A4B2BB" type="text" name="userPassword" id="user-password">
                </label>
                <br><br>
                <label style="color:#01273C;" for="pass-check"> Re Enter Password:
                    <input style="background-color:#A4B2BB" type="text" name="pass-check" id="pass-check">
                </label>
            </p>
            <br><br><br>
            <p>
                <input onclick="<?php header("location: /submit"); ?>" style="color:#BCC8D4;" type="submit" name="submit" value="Submit">
            </p>

        </form>
    </center>
</body>







<?php



//capturing variables from the form 
$firstName =  $_REQUEST['firstName'];
$lastName = $_REQUEST['lastName'];
$userName = $_REQUEST['userName'];
$password = $_REQUEST['userPassword'];
$passCheck = $_REQUEST['passCheck'];




//hashes password into 32 characters
$hashPass = md5($password);


if (isset($_POST['submit'])) {
    // echo 'test';
    // checking if its NOT(!) empty then post the value. Store the value of firstname into the $firstname variable. 
    // sanitize_text_field cleans inout field before we feed anything into the DB
    $firstname = (!empty($_POST['user-firstname'])) ? sanitize_text_field($_POST['user-firstname']) : '';
    $lastname = (!empty($_POST['user-lastname'])) ? sanitize_text_field($_POST['user-lastname']) : '';
    $username = (!empty($_POST['user-username'])) ? sanitize_text_field($_POST['user-username']) : '';
    $password = (!empty($_POST['user-password'])) ? sanitize_text_field($_POST['user-password']) : '';

    echo '<script>alert("Thank you for creating an account!")</script>';
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
            '$lastName', '$userName' ,'$hashPass', 0)";

//Commented for now - trying to find and replace any data entries where the username matches
// $sql = "UPDATE form_data ('$firstName', $lastName, '$userName', '$hashPass')
// WHERE userName = $userName";



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
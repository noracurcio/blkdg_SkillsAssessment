<?php

/**
 * Template Name: LogIn Form
 */

get_header();
?>
<form action="" method="post">
    <label for="user-firstname"> First Name
        <input id="user-firstname" type="text" name="user-firstname" value="">
    </label>
    <label for="user-lastname"> Last Name
        <input id="user-lastname" type="text" name="user-lastname" value="">
    </label>
    <label for="user-username"> Username
        <input id="user-username" type="text" name="user-username" value="">
    </label>

    <label for="user-password"> Password
        <input id="user-password" type="text" name="user-password" value="">
    </label>
    <input type="submit" name="submit" value="Submit">
</form>


<?php
// $db_host = 'localhost';
// $db_user = 'root';
// $db_password = 'root';
// $db_db = 'information_schema';

// $mysqli = @new mysqli(
//     $db_host,
//     $db_user,
//     $db_password,
//     $db_db
// );

// if ($mysqli->connect_error) {
//     echo 'Errno: ' . $mysqli->connect_errno;
//     echo '<br>';
//     echo 'Error: ' . $mysqli->connect_error;
//     exit();
// }

// echo 'Success: A proper connection to MySQL was made.';
// echo '<br>';
// echo 'Host information: ' . $mysqli->host_info;
// echo '<br>';
// echo 'Protocol version: ' . $mysqli->protocol_version;

// $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";

// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $mysqli->close();
?>
<?php




// print results to an array
print_r($_POST);





// if statement - isset is an inherant action - if true POST data stored in submit
if (isset($_POST['submit'])) {
    // echo 'test';
    // checking if its NOT(!) empty then post the value. Store the value of firstname into the $firstname variable. 
    // sanitize_text_field cleans inout field before we feed anything into the DB
    $firstname = (!empty($_POST['user-firstname'])) ? sanitize_text_field($_POST['user-firstname']) : '';
    $lastname = (!empty($_POST['user-lastname'])) ? sanitize_text_field($_POST['user-lastname']) : '';
    $username = (!empty($_POST['user-username'])) ? sanitize_text_field($_POST['user-username']) : '';
    $password = (!empty($_POST['user-password'])) ? sanitize_text_field($_POST['user-password']) : '';


    echo "First Name: $firstname";
    echo "Last Name: $lastname";
    echo "Username: $username";
    echo "Password: $password";
    // Hashing password and storing in hashpass variable
    $hashpass = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

    echo $hashpass;
}

// this exports the variables needed in next function
var_dump($firstname, $lastname, $username, $hashpass);

function myFunction($firstname, $lastname, $hashpass, $username)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'form_data';
    $wpdb->insert($table_name, array('id' => NULL, 'user-firstname' => $firstname, 'user-lastname' => $lastname, 'user-username' => $username, 'user-password' => $hashpass));
}

myFunction($firstname, $lastname, $hashpass, $username);

get_footer();
?>
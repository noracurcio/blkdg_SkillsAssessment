<?php

/**
 * Template Name: LogIn Form
 */

get_header();
?>
<form action="" method="post">
    <label for="user-firstname"> First Name
        <input id="user-firstname" type="text" name="firstName" id="firstName">
    </label>
    <label for="user-lastname"> Last Name
        <input id="user-lastname" type="text" name="lastName" id="lastName">
    </label>
    <label for="user-username"> Username
        <input id="user-username" type="text" name="userName" id="userName">
    </label>

    <label for="user-password"> Password
        <input id="user-password" type="text" name="userPassword" id="userPassword">
    </label>
    <input type="submit" name="submit" value="Submit">
</form>



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

    // mysql guery to insert into table
    $sql = "INSERT INTO submit_data  VALUES ($firstname, 
    $lastname, $username, $password)";

    if (mysqli_query($conn, $sql)) {
        echo "<h3>SUCCESS!!!";
    } else {
        echo "ERROR: sorry,try again $sql. "
            . mysqli_error($conn);
    }


    echo "First Name: $firstname";
    echo "Last Name: $lastname";
    echo "Username: $username";
    echo "Password: $password";
    // Hashing password and storing in hashpass variable
    $hashpass = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

    echo $hashpass;
}

// this exports the variables needed in next function
var_dump($firstname, $lastname, $username, $password);


// connect to database
$conn = mysqli_connect("localhost", "root", "root", "nora_db");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}




// mysql guery to insert into table
// $sql = "INSERT INTO submit_data  VALUES ('kelly', 
//             'belly','bingo','password')";

// if (mysqli_query($conn, $sql)) {
//     echo "<h3>SUCCESS!!!";
// } else {
//     echo "ERROR: sorry,try again $sql. "
//         . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);




// function myFunction($firstname, $lastname, $hashpass, $username)
// {
//     global $wpdb;
//     $table_name = $wpdb->prefix . 'form_data';
//     $wpdb->insert($table_name, array('id' => NULL, 'user-firstname' => $firstname, 'user-lastname' => $lastname, 'user-username' => $username, 'user-password' => $hashpass));
// }

// myFunction($firstname, $lastname, $hashpass, $username);

get_footer();
?>
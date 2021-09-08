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
    // trying to hashpass
    $hashpass = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

    echo $hashpass;
}

get_footer();
?>
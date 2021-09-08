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

// echo is like return or console.log
echo '<pre>';
// print results to an array
print_r($_POST);
// if statement - isset is an inherant action - if true POST data stored in submit
if (isset($_POST['submit'])) {
    echo 'test';
}
get_footer();
?>
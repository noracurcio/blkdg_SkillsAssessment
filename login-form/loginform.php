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
    <label for="user-dob"> Password
        <input id="user-dob" type="text" name="user-dob" value="">
    </label>
</form>
<?php
echo '<pre>';
print_r($_POST);
get_footer();
?>
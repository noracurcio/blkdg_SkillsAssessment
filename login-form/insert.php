<?php
// connection to the db
$conn = mysqli_connect('localhost', 'root', 'root', 'nora_db');
if (!$conn) {
    // if the connection doesn't work, echo it.
    echo 'Connection error: ' . mysqli_connect_error();
}

$sqlquery = "INSERT INTO submit_data (firstName, lastName, userName, userPassword)
VALUES ($firstname, $lastname, $username, $hashpass)";

if ($conn->query($sql) === TRUE) {
    echo "record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$first_name =  $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$sql = "INSERT INTO nora_db VALUES ('$first_name', 
            '$last_name','$username','$password',)";

if(mysqli_query($conn, $sql)){
    echo "<h3>data stored in a database successfully." 
        . " Please browse your localhost php my admin" 
        . " to view the updated data</h3>"; 

    echo nl2br("\n$first_name\n $last_name\n "
        . "$gender\n $address\n $email");
} else{
    echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($conn);
}
  
// Close connection
mysqli_close($conn);

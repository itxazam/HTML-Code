
<?php 

/*This is simple code that is used for the configuration of the php*/
$server = "localhost";   /* This is the name of the server */
$user = "root"; /*By default is the name of the user*/
$pass = "";
$database = "database";

$conn = mysqli_connect($server, $user, $pass, $database); /* This is line use for the connnection */

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>"); /* if connection is not created than show this message on it */
}

?>
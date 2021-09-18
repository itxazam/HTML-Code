<?php 

session_start(); /* A session is started with the session_start() function*/
session_destroy();  /* A session is End with the session_destroy() function*/

header("Location: index.php"); /* headers for an HTTP Response given by the server.*/

?>
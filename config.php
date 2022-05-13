<?php 
define('DESERVER', 'localhost'); // Database Server definedef('DBUSERNAME', 'root'); // Database username define( 'DEPASSWORD", "); // Database password define('DENAME', 'demo'); // Database nane
/* connect to MySQL database */ $db = mysqli_connect(DESERVER, DBUSERNAME, DBPASSWORD, DBNAME);
// Check db connection if($db === false) {
die("Error: connection error. ".mysqli_connect_error());

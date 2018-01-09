<?php


$servername = "localhost";
$username = "uxzofjeh_Bocci";
$password = "Ci4oci4o94!";
$DB_name = "uxzofjeh_dbBocci";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $DB_name);

// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}


//echo "Connected successfully";

$db_selected = mysqli_select_db($conn, $DB_name);

if (!$db_selected) {
die ("Errore nella selezione del database: " . mysqli_error());
}
//echo "Connessione al database avvenuta con successo";

?>



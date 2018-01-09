

<?php
$servername = "localhost";
$username = "alsljclh_joom276";
$password = "i-7A58-Sp2";
$DB_name = "alsljclh_joom276";

echo ("connessione al db:");
// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$db_selected = mysqli_select_db($DB_name, $conn);
if (!$db_selected) {
	die ("Errore nella selezione del database: " . mysqli_error());
}
?>



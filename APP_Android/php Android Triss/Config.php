

<?php

$servername = "mysql.netsons.com";
$username = "uxzofjeh";
$password = "Ci4oci4o94";
$dbname = "uxzofjeh_dbbcstorm";

try {
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if($conn==false){

        echo("Non mi sono connesso");
        }
    }
catch(PDOException $e)
    {
    	die("OOPs something went wrong");
    }

?>
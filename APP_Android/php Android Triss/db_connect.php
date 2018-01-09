<?php

/**
 * A class file to connect to database
 */

 $servername = "localhost";
$username = "uxzofjeh_Bocci";
$password = "Ci4oci4o94!";
$DB_name = "uxzofjeh_dbBocci";

class DB_CONNECT {


    // constructor
    function __construct() {
        // connecting to database
        $this->connect();
    }

    // destructor
    function __destruct() {
        // closing db connection
        $this->close();
    }

    /**
     * Function to connect with database
     */
    function connect() {

        // Connecting to mysql database

        $conn = mysqli_connect($servername, $username, $password, $DB_name);
        if(!$conn){

                 echo "errore connessione";
        }

        echo "Connected successfully";
        // Selecing database
       $db_selected = mysqli_select_db($conn, $DB_name);

       if (!$db_selected) {
die ("Errore nella selezione del database: " . mysqli_error());
}
echo "Connessione al database avvenuta con successo";
        // returing connection cursor
        return $conn;
    }

    /**
     * Function to close db connection
     */
    function close() {
        // closing db connection
        mysql_close();
    }

}

?>
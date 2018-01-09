<?php


// array for JSON response
$response = array();

include 'Config2.php';

$db_selected = mysqli_select_db($conn, $DB_name);

if (!$db_selected) {
die ("Errore nella selezione del database: " . mysqli_error());
}

$result = mysqli_query($conn, "SELECT * FROM Anime");

if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["products"] = array();

    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $product = array();
        $product["nome"] = $row["nome"];
        $product["logo"] = $row["logo"];


        // push single product into final response array
        array_push($response["products"], $product);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "Nessun anime trovato";

    // echo no users JSON
    echo json_encode($response);
}

?>

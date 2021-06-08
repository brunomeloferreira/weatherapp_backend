<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require './db_connection.php';
require './get_api.php';


if (isset($name) && trim($name)) {

//updating data present on DB
    $query = "UPDATE `weather` SET `Temp` = '$temp', `WindSpeed` = '$windspeed', `Humidity` = '$humidity', `Text` = '$text', `Icon` = '$icon'
    WHERE name = '$name'";

    $result = mysqli_query($db_conn, $query);


    if ($result) {
        echo json_encode([
            "msg" => "Update was successful",

        ]);


    } else {
        echo json_encode([
            "msg" => "Update was not successful",
        ]);
    }
} else {
    echo json_encode([
        "msg" => "No location to update",
    ]);
}

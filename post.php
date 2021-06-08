<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET, POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require './db_connection.php';
require './get_api.php';


if (isset($name) && trim($name)) {

//posting data to DB
    $query = "INSERT INTO weather (`Name`, `Region`, `Country`, `Temp`, `WindSpeed`, `Humidity`, `Text`, `Icon`)
    VALUES ('$name','$region','$country','$temp','$windspeed','$humidity','$text','$icon')";

    $result = mysqli_query($db_conn, $query);


    
    if ($result) {
        echo json_encode([
            "msg" => "POST was successful"

        ]);

    } else {
        echo json_encode([
            "msg" => "POST was not successful"
        ]);
    }
} else {
    echo json_encode([
        "msg" => "Please insert location",
        "test" => $name
    ]);
}

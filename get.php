<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET, POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require './db_connection.php';
require './controller.php';

$data = json_decode(file_get_contents("php://input"));

//workaround to make locations with more thaan one word work
$city = str_replace(' ', '_', $data->name);

$readDb = mysqli_query($db_conn, "SELECT * FROM `weather` WHERE Name LIKE '%$city%'");

if (mysqli_num_rows($readDb) > 0 && isset($data->name) && trim($data->name)) {

    $weather = mysqli_fetch_all($readDb, MYSQLI_ASSOC);

//make difference between timestamp on DB and actual date
    $readtimestamp = $weather[0]['TimeStamp'];
    $actualdatetime = gmdate('Y-m-d H:i:s');
    $diff = abs(strtotime($actualdatetime) - strtotime($readtimestamp));

//update if data older than 30 mins
    if ($diff >= 1800) {
        $update = true;
        require_once './get_api.php';

//if not older than 30mins fetch from DB
    } else {
        echo json_encode(
            [
                "msg" => "Data fetched from DB",
                "data" => $weather
            ]
        );
    }

//If no data found on DB, fetch from API
} else if (mysqli_num_rows($readDb) <= 0 && isset($data->name) && trim($data->name)) {
    echo json_encode(
        [
            "msg" => "No data found on DB, fetching from api",
        ]
    );
    $update = false;
    require_once './get_api.php';

//No location inserted
} else {

    echo json_encode(
        [
            "msg" => "Please insert location to search weather forecast",
        ]
    );
}
;

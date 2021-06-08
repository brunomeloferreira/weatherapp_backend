<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET, POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require './db_connection.php';
require './get.php';

//API key
$api_key = "0adba9209d8a480bb2c225628210306";

$data = json_decode(file_get_contents("php://input"));

//getting data from API
$file = "https://api.weatherapi.com/v1/current.json?key=" . $api_key . "&q=" . $city . "&aqi=no";
$data = file_get_contents($file);
$result = json_decode($data, true);

$name = $result['location']['name'];
$region = $result['location']['region'];
$country = $result['location']['country'];
$temp = $result['current']['temp_c'];
$windspeed = $result['current']['wind_kph'];
$humidity = $result['current']['humidity'];
$text = $result['current']['condition']['text'];
$icon = 'http:' . $result['current']['condition']['icon'];

//fetch from api, because there was no data on DB, and post it to DB.
if ($update === false) {
    echo json_encode(
        [
            "msg" => "Data will de posted to DB"
        ]
    );
    require_once './post.php';
//Data was found on DB, but it is older than 30 mins, so it will be updated.
} else {
    echo json_encode(
        [
            "msg" => "Data will de updated, because it has been more than 30 minutes since last update"
        ]
    );
    require_once './update.php';
}

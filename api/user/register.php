<?php 

    require_once("../../models/userdetails.php");

    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $data = json_decode(file_get_contents("php://input"), true);

    $user = new UserDetails;

    $user->username = $data["username"];
    $user->passw = $data["passw"];
    $user->confPassw = $data["confPassw"];

    $done = $user->register();

    if ($done["bool"]) {

        echo json_encode(
            ["bool" => $done["bool"], "message" => $done["message"], "data" => $data]
        );

    } else {

        echo json_encode(
            ["bool" => $done["bool"], "message" => $done["message"], "data" => $data]
        );

    }

    

?>
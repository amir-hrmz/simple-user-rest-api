<?php
require_once 'db.php';
header("Content-Type:application/json");
if (isset($_GET['number']) && $_GET['number'] !== "") {
    $number = $_GET['number'];
    $res = mysqli_query($db, "select * from users where number=$number");

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_array($res);
        $fullname = $row['full_name'];
        $res_code = $row['res_code'];
        $res_descrition = $row['res_description'];
        response($number, $fullname, $res_code, $res_descrition);
    } else {
        response(NULL, NULL, 200, "No Record found");
    }
} else {
    response(NULL, NULL, 400, "Invalid Request");
}


function response($number, $fullname, $res_code, $res_decription)
{
$response['number'] = $number;
$response['full_name'] = $fullname;
$response['res_code'] = $res_code;
$response['res_description'] = $res_decription;
$json_response = json_encode($response);
echo $json_response;
}


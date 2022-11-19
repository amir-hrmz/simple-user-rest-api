<?php
if (isset($_POST['number']) && $_POST['number'] != "") {
    $number = $_POST['number'];
    $url = "http://localhost:8080/api-php/rest/api/" . $number;

    $client = curl_init($url);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    $result = json_decode($response);

    echo "<table>";
    echo "<tr><td>number:</td><td>$result->number</td></tr>";
    echo "<tr><td>full name:</td><td>$result->full_name</td></tr>";
    echo "<tr><td>res_code:</td><td>$result->res_code</td></tr>";
    echo "<tr><td>res_description:</td><td>$result->res_description</td></tr>";
    echo "</table>";

}
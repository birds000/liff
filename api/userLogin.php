<?php
    $userID = $_GET['userID'];
    $username = $_GET['username'];
    $password = $_GET['password'];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        // CURLOPT_URL => 'http://localhost:8080/api/v1/user/login',
        CURLOPT_URL => 'https://mng-auto.8betway.co/api/v1/user/login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "userID": "'.$userID.'",
            "username": "'.$username.'",
            "password": "'.$password.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
?>
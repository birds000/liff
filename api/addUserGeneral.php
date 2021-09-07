<?php
    $bankID = $_POST['bankID'];
    $bankNumber = $_POST['bankNumber'];
    $telphone = $_POST['telphone'];
    $advisor = $_POST['advisor'];
    $channel = $_POST['channel'];

    // $test = $bankID + " " + $bankNumber + " " + $telphone + " " + $advisor + " " + $channel;

    $curl = curl_init();

    curl_setopt_array($curl, array(
        // CURLOPT_URL => 'http://localhost:8080/api/v1/user/add/general',
        CURLOPT_URL => 'https://mng-auto.8betway.co/api/v1/user/add/general',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "bankID": "'.$bankID.'",
            "bankNumber": "'.$bankNumber.'",
            "telphone": "'.$telphone.'",
            "advisor": "'.$advisor.'",
            "channel": "'.$channel.'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
?>
<?php

function getResultById($id, $key) {
    $url = "http://api.sctg.xyz/res.php?key=" . $key . "|onlyxevil&action=get&id=" . $id;
    $rd = rand(0,999);
$us = "Mozilla/5.0 (Linux; Android ) AppleWebKit/501 (KHTML, like Gecko) Chrome Mobile Safari Brave/".$mnk."";

    $ch = curl_init();     
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Host: api.sctg.xyz', 'Content-Type: application/json', 'Connection: keep-alive', 'User-Agent: ' . $us]); // Perbaikan pada CURLOPT_HTTPHEADER
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
   
    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        echo json_encode(['status' => 'error', 'message' => 'Curl error: ' . curl_error($ch)]);
    } else {
        curl_close($ch);
        return $result;
    }
}


// Check if required parameters are provided
if (isset($_GET['id']) && isset($_GET['key'])) {
    $id = $_GET['id'];
    $key = $_GET['key'];

    // Call the function and get the result
    $response = getResultById($id, $key);
    
    echo json_encode(['status' => 'success', 'response' => $response]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'One or more required parameters are missing.']);
}
?>

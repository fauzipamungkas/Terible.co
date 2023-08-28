<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: 78b46877c20d8861954bd7d8395a92a6"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  
    $array_response = json_decode($response, true);
    $data_provinsi = $array_response["rajaongkir"]["result"];

    foreach ($data_provinsi as $key => $value){
        echo    "<option value='".$value["province_id"]."' id_provinsi='".$value["province_id"]."'>
                    $value["province"]
                </option>"
    }
}
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=39&province=5",
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
    $data_kota = $array_response["rajaongkir"]["results"];

    // echo "<pre>";
    // print_r($data_kota);
    // echo "</pre>";
    foreach ($data_kota as $key => $value) {
        echo "<option 
        id_kota='".$value["city_id"]."' 
        nama_provinsi='".$value["province"]."'
        nama_kota='".$value["city_name"]."'
        kode_pos='".$value["postal_coe"].'"'
        >";
        echo $value["type"];
        echo $value["city_name"];
        echo "</option>";
    }
}
<?php
 $curl = curl_init();

 curl_setopt_array($curl, array(
 CURLOPT_URL => 'https://mps.digitalpulseapi.net/1.0/send-sms/anq',
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => '',
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 0,
 CURLOPT_FOLLOWLOCATION => true,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => 'POST',
 CURLOPT_POSTFIELDS =>'{
   "sender": "NOUN",
   "message": "'.$msg.'",
     "receiver": "'.$this->app_mob.'"}',
 CURLOPT_HTTPHEADER => array(
   'api-key: N1Y8NIuMPhV5kDwCQgBxEA==',
   'Content-Type: application/json'
 ),
 ));
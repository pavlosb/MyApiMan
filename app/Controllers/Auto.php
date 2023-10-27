<?php

namespace App\Controllers;

class Auto extends BaseController
{
    public function index(): string
    {
        $client = \Config\Services::curlrequest();
        $headerData = array(
            'ApiIntegrationCode' => '5IXBPE3XZTKWTF4562735DXFAAA',
            'UserName' => 'dsehfrek2bzrqfw@inline.gr',
            'Secret'   => 'M#z7c3$ZP*t0dW4@N~x69E@wn',
            'Content-Type' => 'application/json'
        );

        $apiURL = 'https://webservices19.autotask.net/atservicesrest/v1.0/Companies/query?search={"filter":[{"op":"in","field":"CompanyType","value":[1,3,7]}]}';
        $response = $client->get($apiURL,[
            'debug' => true,
            'headers'=>$headerData
        ]);

    // Read response
    $code = $response->getStatusCode();
   

    if($code == 200){ // Success

        // Read data 
        $body = json_decode($response->getBody());

       print_r($body);

    } else {
        echo "failed";
        die;
    }
    }

    
}

<?php

namespace App\Controllers;

class Autoapi extends BaseController
{
    private $apiuri = 'https://webservices19.autotask.net/atservicesrest/v1.0/';
    private $apiic = '5IXBPE3XZTKWTF4562735DXFAAA';
    private $apiuser = 'dsehfrek2bzrqfw@inline.gr';
    private $apipass = 'M#z7c3$ZP*t0dW4@N~x69E@wn';
    
    public function index()
    {
        $client = \Config\Services::curlrequest([
            'baseURI' =>  $this->$apiuri,
        ]);
        $headerData = array(
            'ApiIntegrationCode' => $this->apiic,
            'UserName' => $this->apiuser,
            'Secret'   => $this->apipass,
            'Connection' => 'Keep-Alive',
            'Accept-Encoding' => 'gzip, deflate, br',
            'Content-Type' => 'application/json',
        );

        $apiURL = 'https://webservices19.autotask.net/atservicesrest/v1.0/Companies/query?search={"filter":[{"op":"in","field":"CompanyType","value":[1,3,7]}]}';
        $response = $client->get($apiURL,[
            'debug' => true,
            'headers'=>$headerData,
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

    public function more() {
        echo "moretesting";    }
}

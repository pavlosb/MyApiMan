<?php

namespace App\Controllers;

class Autoapi extends BaseController
{

protected $testvar;
        function __construct(){
        parent::__construct(); // needed when adding a constructor to a controller
        $this->testvar = "my test var";
        }
    
    public function index()
    {
        
        echo $this->testvar;
        
        $client = \Config\Services::curlrequest([
            'baseURI' => 'https://webservices19.autotask.net/atservicesrest/v1.0/'
        ]);
        $headerData = array(
            'ApiIntegrationCode' => '5IXBPE3XZTKWTF4562735DXFAAA',
            'UserName' => 'dsehfrek2bzrqfw@inline.gr',
            'Secret'   => 'M#z7c3$ZP*t0dW4@N~x69E@wn',
            'Connection' => 'Keep-Alive',
            'Accept-Encoding' => 'gzip, deflate, br',
            'Content-Type' => 'application/json',
        );

        $requrl = 'Companies/query?search={"filter":[{"op":"in","field":"CompanyType","value":[1,3,7]}]}';
      $response = $client->request('get', $requrl, [
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

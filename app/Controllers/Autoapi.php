<?php

namespace App\Controllers;

class Autoapi extends BaseController
{

  
    
    public function index()
    {
        echo getenv("MYSET");
        

        $client = \Config\Services::curlrequest([
            'baseURI' => getenv("ATASK_URI")
        ]);
        $headerData = array(
            'ApiIntegrationCode' => getenv("ATASK_AIC"),
            'UserName' => getenv("ATASK_USER"),
            'Secret'   => getenv("ATASK_SECRET"),
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

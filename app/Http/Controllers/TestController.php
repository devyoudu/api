<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

/* BASE API TEST */
class TestController extends Controller
{
    // How to connect and consume a simple API request
    public function index()
    {


        // Marca Laser API Token
        $token = '*****';

        // Curl example
        /*$curl  = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('API_MARCALASER') . "product?category=Black",
            CURLOPT_RETURNTRANSFER =>  true,
            CURLOPT_ENCODING =>  "",
            CURLOPT_MAXREDIRS =>  10,
            CURLOPT_TIMEOUT =>  0,
            CURLOPT_FOLLOWLOCATION =>  true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_FOLLOWLOCATION =>  "GET",
            CURLOPT_HTTPHEADER =>  array(
                "Authorization: Bearer " . $token
            ),
        ));
        $response  = curl_exec($curl);
        curl_close($curl);
        echo $response;*/


        // API Base - env file
        $client = new Client(['base_uri' => env('API_MARCALASER')]);

        // Connection params
        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept'        => 'application/json',
        ];

        /** SEARCH PRODUCTS EXAMPLE */
        // Query params
        $params = [
            'category' => 'Black',
            'product_title' => 'Caderno'
        ];

        // Request API (Product)
        $response = $client->request('GET', 'products', [
                'headers' => $headers,
                'query' => $params
        ]);

        echo "Testing API products request - filtering category => Black, product_title => Caderno";
        echo "\n";

        // Result
        dd(json_decode($response->getBody()->getContents()));

    }

}

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
        $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIyMzgzMjc3MyIsIm5hbWUiOiJNYXJjYUxhc2VyIiwiaWF0IjoxNTE2MjM5MDIyfQ.-2XQw_TDJBVXznc_Z-Z2DLAZCezBHT6IK-9nPgjx_Zg';

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
        $response = $client->request('GET', 'product', [
                'headers' => $headers,
                'query' => $params
        ]);

        echo "Testing API products request - filtering category => Black, product_title => Caderno";
        echo "\n";

        // Result
        dd(json_decode($response->getBody()->getContents()));

    }

}

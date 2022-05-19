<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class ExternalAPIsController extends Controller
{
    public function externalUsers()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/users');
        $responseDAta = json_decode($response->body());

        return view("api.external",['users'=>$responseDAta]);
    }
}

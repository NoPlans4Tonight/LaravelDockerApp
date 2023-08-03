<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Home extends Controller
{
    /**
     * 
     * return home page as JSON
     */
    public function home(): JsonResponse
    {
        $data = [
            "title" => "Home Page",
            "Body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque accusantium magnam, rerum et ullam assumenda eveniet fugit nulla quasi sapiente perferendis nihil repudiandae ratione totam incidunt esse culpa cumque dignissimos!"
        ];

        $response = [
            "status" => 1,
            "data" => $data,
        ];

        return response()->json($response);
    }
}

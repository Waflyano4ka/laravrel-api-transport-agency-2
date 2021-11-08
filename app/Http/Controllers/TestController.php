<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function hash(Request $request): \Illuminate\Http\JsonResponse
    {
        $password = $request->input('password');
        $hash = bcrypt($password);
        return response()->json([
            "hash" => $hash,
        ]);
    }
}

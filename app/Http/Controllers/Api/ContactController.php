<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store (Request $request) 
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if ($validator->fails) {
            return response()->json([
                'success'=> false,
                'errors'=> $validator->errors()
            ]);
        }
    }
}

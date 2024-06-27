<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SvController extends Controller
{
    public function index(){
        $ttsv= [
            [
                'id' => '1',
                'name'=> 'kien',
                'email'=> 'kiendmph32981@fpt.edu.vn',
                'class'=> 'WD18321'
            ],
            [
                'id' => '2',
                'name'=> 'doan',
                'email'=> 'doannvph33201@fpt.edu.vn',
                'class'=> 'WD18321'
            ]
            ];
            return view('ttsv',compact('ttsv'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function index(Request $request)
    {
        return view('index')->with([
            'class{!! $i !!}_grade' => $request->session()->get('class{!! $i !!}_grade', ''),
            'class{!! $i !!}_type' => $request->session()->get('class{!! $i !!}_type', 'class-type'),
            'finalGPA' => $request->session()->get('finalGPA', null),
        ]);
    }

    public function calculateGPA(Request $request)
    {
        $finalGPA;
        
        if($request->weighted)
        {
            dump($request->weighted);
        }
    }
}

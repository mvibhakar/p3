<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Validator;

class CalculateController extends Controller
{
    public function index(Request $request)
    {
        return view('/gpa/index')->with([
            'finalGPA' => $request->session()->get('finalGPA', null),
        ]);
    }

    public function calculateGPA(Request $request)
    {
        $request->validate([
            'class1-grade' => 'required|digits:2',
            'class2-grade' => 'required|digits:2',
            'class3-grade' => 'required|digits:2',
            'class4-grade' => 'required|digits:2',
            'class1-type' => 'required',
            'class2-type' => 'required',
            'class3-type' => 'required',
            'class4-type' => 'required'
        ]);

        $grades = [$request->input('class1-grade'), $request->input('class2-grade'), $request->input('class3-grade'), $request->input('class4-grade')];
        $types = [$request->input('class1-type'), $request->input('class2-type'), $request->input('class3-type'), $request->input('class4-type')];

        $totalBeforeDivision = 0;
        foreach ($grades as &$grade) {
            if ($grade > 60) {
                $grade -= 60;
                $gpaForClass = $grade / 10;
                $totalBeforeDivision += $gpaForClass;
            } else {
                continue;
            }
        }
        if ($request->has('weighted')) {
            foreach ($types as &$type) {
                if ($type == 'honors') {
                    $totalBeforeDivision += 0.5;
                } else if ($type == 'ap') {
                    $totalBeforeDivision += 1;
                }
            }
        }

        $finalGPA = $totalBeforeDivision / 6;
        $finalGPA = round($finalGPA, 2);

        return redirect('/')->with([
            'finalGPA' => $finalGPA
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }

    public function calculate(Request $request)
    {
        $number1 = $request->input('number1');
        $number2 = $request->input('number2');
        $operation = $request->input('operation');

        $result = 0;
        switch ($operation) {
            case 'tambah':
                $result = $number1 + $number2;
                break;
            case 'kurang':
                $result = $number1 - $number2;
                break;
            case 'kali':
                $result = $number1 * $number2;
                break;
            default:
                $result = 'Invalid operation';
                break;
        }

        return view('calculator', compact('result', 'number1', 'number2', 'operation'));
    }
}

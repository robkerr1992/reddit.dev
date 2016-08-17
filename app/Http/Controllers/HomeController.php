<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function showWelcome(){
        return view('welcome');
    }

    public function rollDice($guess = 3){
        $randomNum = mt_rand(1,6);
        $data = [
            'randomNum' => $randomNum,
            'guess' => intval($guess),
        ];
        // dd($data);
        return view('roll-dice', $data);
    }

    public function upperCase($word = "I'm not yelling!!!!"){
        $data = [
        'word' => $word,
        'upper' => strtoupper($word),
    ];
    return view('uppercase', $data);
    }

    public function increment($number = 0){
        $data = [
        'number' => $number,
        'number+1' => $number + 1, 
    ];
    return view('increment', $data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        $games = Game::where('category', '=', 'action')
        ->where('top', '=', 'yes')
        ->take(3)
        ->get();
        

        $games2 = Game::where('category', '=', 'sport')
        ->where('top', '=', 'yes')
        ->take(3)
        ->get();
       
        return view("main" ,[
            
           
            'mytopgames' => $games,
            "mytopgames2"=>$games2
    ]);
        
       }
}

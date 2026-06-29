<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SoldeController extends Controller
{
    public function cataloguepdf(){

        // Récupérer les produits avec un solde égal à 1
        $games = Game::where('solde', 1)->get();
        
        
        
        
        $data = [
            'games' => $games,
        ];
        
        // Générer le PDF
        $pdf =Pdf::loadView('catalogue',$data);
        
        // Télécharger le PDF
        return $pdf->stream();
        
        
        
    }   
    public function mypromo(){

        $promoGames = Game::where('solde', 1)->get();
        return view("promo", ['promoGames' => $promoGames]);
        
        
    }   
    
}

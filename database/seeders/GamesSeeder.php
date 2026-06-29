<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GamesSeeder extends Seeder
{
    public function run()
    {
        $steam = 'https://shared.cloudflare.steamstatic.com/store_item_assets/steam/apps';
        $games = [
            //= 10 action games
            ['name' => 'God of War Ragnarok', 'image' => "$steam/2322010/header.jpg", 'desc' => 'Rejoignez Kratos et Atreus dans une aventure mythologique à travers les neuf royaumes.', 'prix' => 49.99, 'category' => 'action'],
            ['name' => 'Horizon Forbidden West', 'image' => "$steam/2420110/header.jpg", 'desc' => 'Explorez un monde post-apocalyptique avec Aloy et affrontez des machines redoutables.', 'prix' => 44.99, 'category' => 'action'],
            ['name' => 'Spider-Man Remastered', 'image' => "$steam/1817070/header.jpg", 'desc' => 'Incarnez Spider-Man et protégez New York dans cette aventure épique.', 'prix' => 39.99, 'category' => 'action'],
            ['name' => 'Red Dead Redemption 2', 'image' => "$steam/1174180/header.jpg", 'desc' => 'Vivez l\'épopée de l\'Ouest sauvage avec Arthur Morgan.', 'prix' => 39.99, 'category' => 'action'],
            ['name' => 'Cyberpunk 2077', 'image' => "$steam/1091500/header.jpg", 'desc' => 'Explorez Night City, un monde ouvert futuriste où vos choix façonnent votre légende.', 'prix' => 34.99, 'category' => 'action'],
            ['name' => 'Elden Ring', 'image' => "$steam/1245620/header.jpg", 'desc' => 'Affrontez des créatures mythiques dans le monde fantastique de l\'Entre-terre.', 'prix' => 34.99, 'category' => 'action'],
            ['name' => 'Ghost of Tsushima', 'image' => "$steam/2215430/header.jpg", 'desc' => 'Incarnez Jin Sakai, un samouraï en quête de justice pendant l\'invasion mongole.', 'prix' => 34.99, 'category' => 'action'],
            ['name' => 'Grand Theft Auto V', 'image' => "$steam/271590/header.jpg", 'desc' => 'Explorez Los Santos dans le monde ouvert le plus célèbre du jeu vidéo.', 'prix' => 29.99, 'category' => 'action'],
            ['name' => 'DOOM Eternal', 'image' => "$steam/782330/header.jpg", 'desc' => 'Devenez le Doom Slayer et anéantissez les démons dans ce FPS frénétique.', 'prix' => 29.99, 'category' => 'action'],
            ['name' => 'Sekiro Shadows Die Twice', 'image' => "$steam/814380/header.jpg", 'desc' => 'Maîtrisez l\'art du shinobi dans un Japon médiéval fantastique.', 'prix' => 24.99, 'category' => 'action'],

            //= 10 sport games
            ['name' => 'EA Sports FC 24', 'image' => "$steam/2195250/header.jpg", 'desc' => 'Vivez le football ultime avec des équipes et des compétitions du monde entier.', 'prix' => 44.99, 'category' => 'sport'],
            ['name' => 'F1 23', 'image' => "$steam/2118850/header.jpg", 'desc' => 'Vivez l\'excitation de la Formule 1 avec des circuits emblématiques.', 'prix' => 39.99, 'category' => 'sport'],
            ['name' => 'NBA 2K24', 'image' => "$steam/2338770/header.jpg", 'desc' => 'Maîtrisez le basketball avec des graphismes exceptionnels.', 'prix' => 39.99, 'category' => 'sport'],
            ['name' => 'Tony Hawk Pro Skater 1+2', 'image' => "$steam/1829610/header.jpg", 'desc' => 'Maîtrisez des astuces emblématiques dans ce remake legendaire.', 'prix' => 34.99, 'category' => 'sport'],
            ['name' => 'WWE 2K24', 'image' => "$steam/2348670/header.jpg", 'desc' => 'Entrez dans l\'arène avec vos superstars WWE préférées.', 'prix' => 34.99, 'category' => 'sport'],
            ['name' => 'Riders Republic', 'image' => "$steam/2290180/header.jpg", 'desc' => 'Participez à des compétitions de sports extrêmes en monde ouvert.', 'prix' => 29.99, 'category' => 'sport'],
            ['name' => 'MotoGP 23', 'image' => "$steam/2148670/header.jpg", 'desc' => 'Enfourchez votre moto et défiez les meilleurs pilotes du MotoGP.', 'prix' => 24.99, 'category' => 'sport'],
            ['name' => 'SnowRunner', 'image' => "$steam/1465360/header.jpg", 'desc' => 'Conduisez des véhicules puissants à travers des terrains extrêmes.', 'prix' => 24.99, 'category' => 'sport'],
            ['name' => 'WWE 2K22', 'image' => "$steam/1959770/header.jpg", 'desc' => 'Combattez avec les superstars WWE dans des matchs spectaculaires.', 'prix' => 19.99, 'category' => 'sport'],
            ['name' => 'Rocket League', 'image' => "$steam/252950/header.jpg", 'desc' => 'Mélangez le football et les voitures dans des matchs explosifs.', 'prix' => 14.99, 'category' => 'sport'],
        ];

        foreach ($games as $game) {
            Game::create(array_merge($game, ['status' => 'available', 'top' => 'no', 'solde' => false]));
        }
    }
}

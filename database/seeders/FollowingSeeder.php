<?php

namespace Database\Seeders;

use App\Models\Following\Following;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowingSeeder extends Seeder
{

    public function run(): void
    {
        $following = new Following();
        $following->show_id = 8;
        $following->show_image = 'kikis_banner.jpg';
        $following->show_name = 'Kiki: Entregas a domicilio';
        $following->user_id = 1;
        $following->save();

        $following = new Following();
        $following->show_id = 6;
        $following->show_image = 'ninoylagarza-banner.jpg';
        $following->show_name = 'El niño y la garza';
        $following->user_id = 1;
        $following->save();

        $following = new Following();
        $following->show_id = 9;
        $following->show_image = 'spiritaways_banner.jpg';
        $following->show_name = 'El viaje de Chihiro';
        $following->user_id = 1;
        $following->save();

        $following = new Following();
        $following->show_id = 5;
        $following->show_image = 'howlmovingcastle-banner.jpg';
        $following->show_name = 'El increíble castillo vagabundo';
        $following->user_id = 1;
        $following->save();

    }
}

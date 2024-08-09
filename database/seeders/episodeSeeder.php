<?php

namespace Database\Seeders;

use App\Models\Episode\Episode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class episodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     */
/* 

 */

    public function run(): void
    {
        $episode = new Episode();
        $episode->show_id = 3;
        $episode->episode_name = '1';
        $episode->video = 'dragonball.mp4';
        $episode->thumbnail = 'dragonball-banner.jpg';
        $episode->save();

        $episode = new Episode();
        $episode->show_id = 5;
        $episode->episode_name = '1';
        $episode->video = 'howlmovingcastle.mp4';
        $episode->thumbnail = 'howlmovingcastle-banner.jpg';
        $episode->save();

        $episode = new Episode();
        $episode->show_id = 8;
        $episode->episode_name = '1';
        $episode->video = 'kikis.mp4';
        $episode->thumbnail = 'kikis_banner.jpg';
        $episode->save();

        $episode = new Episode();
        $episode->show_id = 2;
        $episode->episode_name = '1';
        $episode->video = 'lostcanvas.mp4';
        $episode->thumbnail = 'lostcanvas-banner.jpg';
        $episode->save();

        $episode = new Episode();
        $episode->show_id = 6;
        $episode->episode_name = '1';
        $episode->video = 'ninoylagarza.mp4';
        $episode->thumbnail = 'ninoylagarza-banner.jpg';
        $episode->save();

        $episode = new Episode();
        $episode->show_id = 7;
        $episode->episode_name = '1';
        $episode->video = 'ponyo.mp4';
        $episode->thumbnail = 'ponyo_banner.jpg';
        $episode->save();

        $episode = new Episode();
        $episode->show_id = 9;
        $episode->episode_name = '1';
        $episode->video = 'spiritedaway.mp4';
        $episode->thumbnail = 'spiritaways_banner.jpg';
        $episode->save();

        $episode = new Episode();
        $episode->show_id = 1;
        $episode->episode_name = '1';
        $episode->video = 'totoro.mp4';
        $episode->thumbnail = 'totoro-banner.jpg';
        $episode->save();

        $episode = new Episode();
        $episode->show_id = 4;
        $episode->episode_name = '1';
        $episode->video = 'attackontitan.mp4';
        $episode->thumbnail = 'attackoftitan-banner.jpg';
        $episode->save();

    }
}

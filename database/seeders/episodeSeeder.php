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
    public function run(): void
    {
        $episode = new Episode();
        $episode->show_id = 1;
        $episode->episode_name = '1';
        $episode->video = '1.mp4';
        $episode->thumbnail = 'anime-watch.jpg';
        $episode->save();

        $episode = new Episode();
        $episode->show_id = 2;
        $episode->episode_name = '1';
        $episode->video = '2.mp4';
        $episode->thumbnail = 'anime-watch-2.jpg';
        $episode->save();

        $episode = new Episode();
        $episode->show_id = 1;
        $episode->episode_name = '2';
        $episode->video = '3.mp4';
        $episode->thumbnail = 'anime-watch.jpg';
        $episode->save();

        $episode = new Episode();
        $episode->show_id = 2;
        $episode->episode_name = '2';
        $episode->video = '4.mp4';
        $episode->thumbnail = 'anime-watch-2.jpg';
        $episode->save();
    }
}

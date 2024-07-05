<?php

namespace Database\Seeders;

use App\Models\Show\Show;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $show = new Show();
        $show->name = 'Fate / Stay Night: Unlimited Blade Works';
        $show->image = 'hero-1.jpg';
        $show->description = 'Fate / Stay Night: Unlimited Blade Works is an anime series produced by the Ufotable studio. It is the second adaptation of the visual novel Fate / Stay Night by Type-Moon, after the 2006 anime series by Studio Deen. The series is directed by Takahiro Miura and written by Akira Hiyama, with music by Hideyuki Fukasawa.';
        $show->type = 'TV Serie';
        $show->studios = 'Ufotable';
        $show->date_aired = '2014-10-12';
        $show->status = 'Airing';
        $show->genere = 'Adventure';
        $show->duration = '24 min/ep';
        $show->quality = 'HD';
        $show->save();

        $show = new Show();
        $show->name = 'The Seven Deadly Sins: Wrath of the Gods';
        $show->image = 'trend-1.jpg';
        $show->description = 'The Seven Deadly Sins: Wrath of the Gods is the third season of the anime series The Seven Deadly Sins, produced by Studio Deen. The series is directed by Susumu Nishizawa and written by Rintarō Ikeda, with music by Hiroyuki Sawano and Kohta Yamamoto.';
        $show->type = 'TV Serie';
        $show->studios = 'Studio Deen';
        $show->date_aired = '2019-10-09';
        $show->status = 'Airing';
        $show->genere = 'Action';
        $show->duration = '29 min/ep';
        $show->quality = 'Full HD';
        $show->save();

    }
}

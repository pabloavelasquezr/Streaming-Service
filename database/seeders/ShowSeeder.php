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
        $show->name = 'Mi vecino Totoro';
        $show->image = 'totoro-banner.jpg';
        $show->description = 'Cuando hospitalizan a su madre, estas dos hermanas van a la campiña japonesa a pasar el verano con su padre.';
        $show->type = 'Movie';
        $show->studios = 'Studio Ghibli';
        $show->date_aired = '2012-11-22';
        $show->status = 'Airing';
        $show->genere = 'Adventure';
        $show->duration = '60 min/ep';
        $show->quality = 'HD';
        $show->save();

        $show = new Show();
        $show->name = 'Saint Seiya The Lost Canvas';
        $show->image = 'lostcanvas-banner.jpg';
        $show->description = '“Las Guerras Santas” - desde los tiempos de leyenda, estas batallas se han repetido entre la diosa Athena y Hades,el rey del Inframundo. El S. XVIII mucho antes de la era de los Caballeros del Zodiaco durante la época en que eran Guerreros. ¡La historia nunc antes contada de la Guerra Santa entre el Caballero Pegaso, Hades el Dios del Inframundo y la Diosa Athena ha comenzado!';
        $show->type = 'TV Series';
        $show->studios = 'TMS Entertainment Co., Ltd.';
        $show->date_aired = '2010-05-10';
        $show->status = 'Airing';
        $show->genere = 'Action';
        $show->duration = '60 min/ep';
        $show->quality = 'HD';
        $show->save();

        $show = new Show();
        $show->name = 'Dragon Ball Super';
        $show->image = 'dragonball-banner.jpg';
        $show->description = 'Vuelve Dragon Ball con una nueva serie tras muchos años. Nuevos enemigos, nuevas y poderosas formas, y nuevos personajes que darán forma al futuro de los conocidos personajes.\r\n\r\n¡Emociónate, disfruta y diviértete con Son Goku, Vegeta, Gohan y el resto de sus compañeros!';
        $show->type = 'TV Series';
        $show->studios = 'Toei Animation';
        $show->date_aired = '2015-02-22';
        $show->status = 'Airing';
        $show->genere = 'Action';
        $show->duration = '30 min/ep';
        $show->quality = 'HD';
        $show->save();

        $show = new Show();
        $show->name = 'Attack on Titan';
        $show->image = 'attackoftitan-banner.jpg';
        $show->description = 'Muchos años atrás, la humanidad estuvo al borde de la extinción con la aparición de unas criaturas gigantes que devoraban a todas las personas. Huyendo, la humanidad consiguió sobrevivir en una ciudad fortificada de altas murallas que se ha convertido en el último reducto de la civilización contra los Titanes que campan a sus anchas por el mundo. Ahora esa paz está a punto de verse interrumpida por una cadena de acontecimientos que llevará a desvelar qué son los Titanes y cómo aparecieron.';
        $show->type = 'TV Series';
        $show->studios = 'Kodansha Ltd.';
        $show->date_aired = '2008-12-02';
        $show->status = 'Airing';
        $show->genere = 'Action';
        $show->duration = '30 min/ep';
        $show->quality = 'HD';
        $show->save();

        $show = new Show();
        $show->name = 'El increíble castillo vagabundo';
        $show->image = 'howlmovingcastle-banner.jpg';
        $show->description = 'Sophie es una adolescente que trabaja en una tienda de sombreros en un pueblo como muchos, pero su vida da un giro total cuando una bruja la transforma en una anciana.';
        $show->type = 'Movie';
        $show->studios = 'Studio Ghibli';
        $show->date_aired = '2003-05-10';
        $show->status = 'Airing';
        $show->genere = 'Magic';
        $show->duration = '60 min/ep';
        $show->quality = 'HD';
        $show->save();

        $show = new Show();
        $show->name = 'El niño y la garza';
        $show->image = 'ninoylagarza-banner.jpg';
        $show->description = 'A través de encuentros con sus amigos y su tío, sigue el desarrollo psicológico de un adolescente. Entra en un mundo mágico con una garza gris parlante tras encontrar una torre abandonada en su nueva ciudad.';
        $show->type = 'Movie';
        $show->studios = 'Studio Ghibli';
        $show->date_aired = '2024-02-22';
        $show->status = 'Airing';
        $show->genere = 'Adventure';
        $show->duration = '60 min/ep';
        $show->quality = 'HD';
        $show->save();

        $show = new Show();
        $show->name = 'Ponyo y el secreto de la sirenita';
        $show->image = 'ponyo_banner.jpg';
        $show->description = 'Sosuke, un niño de 5 años, forja una amistad con una princesita pez a quien bautiza Ponyo, quien quiere desesperadamente ser humana.';
        $show->type = 'Movie';
        $show->studios = 'Studio Ghibli';
        $show->date_aired = '2008-05-10';
        $show->status = 'Airing';
        $show->genere = 'Adventure';
        $show->duration = '60 min/ep';
        $show->quality = 'HD';
        $show->save();

        $show = new Show();
        $show->name = 'Kiki: Entregas a domicilio';
        $show->image = 'kikis_banner.jpg';
        $show->description = 'En esta aventura animada, Kiki se muda fuera de la casa de sus padres para perfeccionar su magia, pero descubre que hacer nuevos amigos es más difícil de lo que parece.';
        $show->type = 'Movie';
        $show->studios = 'Studio Ghibli';
        $show->date_aired = '1992-05-10';
        $show->status = 'Airing';
        $show->genere = 'Romance';
        $show->duration = '60 min/ep';
        $show->quality = 'HD';
        $show->save();

        $show = new Show();
        $show->name = 'El viaje de Chihiro';
        $show->image = 'spiritaways_banner.jpg';
        $show->description = 'Chihiro se adentra en un mundo mágico reinado por una bruja, donde quienes no obedecen son transformados en animales.';
        $show->type = 'Movie';
        $show->studios = 'Studio Ghibli';
        $show->date_aired = '2000-03-10';
        $show->status = 'Airing';
        $show->genere = 'Adventure';
        $show->duration = '60 min/ep';
        $show->quality = 'HD';
        $show->save();

    }
}

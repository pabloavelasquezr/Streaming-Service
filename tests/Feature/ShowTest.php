<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ShowTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_show_comments(): void
    {
        // migración y carga de datos
        Artisan::call('migrate:refresh --seed');
        // carga del formulario inicial
        $carga = $this->get(route('login'));
        $carga->assertStatus(200)->assertSee('Login');

        //login correcto
        $loginCorrecto = $this->post(route('login'), [
            'email' => 'janedoe@test.com',
            'password' => 'password'
        ]);
        $loginCorrecto->assertStatus(302)->assertRedirect(route('home'));

        //verificamos el acceso a la vista show con comentarios
        $show = $this->get(route('anime.details', ['id' => 7]));
        $show->assertStatus(200)->assertSee('Review');
        
        // publicar comentario
        $comentario = $this->post(route('anime.insert.comments', ['id' => 7]), [
            'comment' => 'COMENTARIO EXITOSO DE LA PRUEBA!!!'
        ]);
        $comentario->assertStatus(302)
        ->assertRedirect(route('anime.details', ['id' => 7]));
        $comentario->assertSessionHas('success', 'Comment added successfully');
    }
    
    public function test_show_follow(): void
    {
        // migración y carga de datos
        Artisan::call('migrate:refresh --seed');
        // carga del formulario inicial
        $carga = $this->get(route('login'));
        $carga->assertStatus(200)->assertSee('Login');

        //login correcto
        $loginCorrecto = $this->post(route('login'), [
            'email' => 'janedoe@test.com',
            'password' => 'password'
        ]);
        $loginCorrecto->assertStatus(302)->assertRedirect(route('home'));

        //verificamos el acceso a la vista show details
        $show = $this->get(route('anime.details', ['id' => 7]));
        $show->assertStatus(200)->assertSee('Follow');

        // seguir show
        $follow = $this->post(route('anime.follow', ['id' => 7]), [
            'show_image' => DB::table('shows')->where('id', 7)->value('image'),
            'show_name' => DB::table('shows')->where('id', 7)->value('name')
        ]);
        // debug $follow
        //dd($follow);
        $follow->assertStatus(302)->assertRedirect(route('anime.details', ['id' => 7]));
        $follow->assertSessionHas('follow', 'You followed this show successfully');

    }

}

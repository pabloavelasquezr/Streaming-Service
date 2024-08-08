<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function test_register()
    {
        Artisan::call('migrate:refresh --seed');
        // El formulario carga
        $carga = $this->get(route('register'));
        $carga->assertStatus(200)->assertSee('Sign Up');

        // registro incorrecto
        $registroMal = $this->post(route('register'), [
            'email' => 'aaa',
            'password' => '132']
        );
        $registroMal->assertStatus(302)
        ->assertRedirect(route('register'))
        ->assertSessionHasErrors([
            'email' => __('validation.email', ['attribute' => 'email']), 
            'password' => __('validation.min.string', ['attribute' => 'password', 'min' => 8]),
            'name' => __('validation.required', ['attribute' => 'name'])
        ]);

        // registro con email existente
        $registroDuplicado = $this->post(route('register'), [
            'name' => 'Duplicate Test',
            'email' => 'pabloavelasquez@gmail.com',
            'password' => '87654321',
            'password_confirmation' => '87654321'
        ]);
        $registroDuplicado->assertStatus(302)
        ->assertRedirect(route('register'))
        ->assertSessionHasErrors([
            'email' => __('validation.unique', ['attribute' => 'email'])
        ]);

        // registro correcto
        $registroBien = $this->post(route('register'), [
            'name' => 'Test',
            'email' => 'prueba@prueba.com',
            'password' => '12345678',
            'password_confirmation' => '12345678'
        ]);
        $registroBien->assertStatus(302)
        ->assertRedirect(route('home'));
        $this->assertDatabaseHas('users', ['email' => 'prueba@prueba.com']);
         
    }

    public function test_login()
    {
        //Migrar la base de datos 
        Artisan::call('migrate:refresh --seed');
        
        //El formulario carga
        $carga = $this->get(route('login'));
        $carga->assertStatus(200)->assertSee('Login');

        //Error en credenciales
        $credencialesMal = $this->post(route('login'), ["email" => "pabloavelasquez@gmail.com", "password" => "No es"]);
        $credencialesMal->assertStatus(302)->assertRedirect(route('login'))->assertSessionHasErrors(['email' => 'These credentials do not match our records.']);

        //Acceso correcto
        $accesoBien = $this->post(route('login'), ["email" => "pabloavelasquez@gmail.com", "password" => "password"]);
        $accesoBien->assertStatus(302)->assertRedirect(route('home'));

        //Vista de la portada
        $listado = $this->get(route('home'));
        $listado->assertStatus(200)->assertSee('Homepage');

        //Logout
        $logout = $this->post(route('logout'));
        $logout->assertStatus(302)->assertRedirect('/'); 
        
        //Intento de acceso no autorizado 
        $accesoMal = $this->get(route('users.followed.shows'));
        $accesoMal->assertStatus(302)->assertRedirect(route('login'));
        
    }
}
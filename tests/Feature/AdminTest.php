<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AdminTest extends TestCase
{
    public function test_login_admin(): void
    {
        // migración y carga de datos
        Artisan::call('migrate:refresh --seed');
        // carga del formulario
        $carga = $this->get('admin/login');
        $carga->assertStatus(200)->assertSee('Login');
        // login incorrecto
        $loginIncorrecto = $this->post('admin/login', [
            'email' => 'pabloavelasquez@gmail.com',
            'password' => '132'
        ]);
        $loginIncorrecto->assertStatus(302)->assertRedirect('admin/login')->assertSessionHasErrors(['email' => 'Invalid email or password']);

        // login correcto
        $loginCorrecto = $this->post('admin/login', [
            'email' => 'pabloavelasquez@gmail.com',
            'password' => 'password'
        ]);
        $loginCorrecto->assertStatus(302)->assertRedirect('admin/index');

        //verificamos el acceso a la vista dashboard
        $dashboard = $this->get('admin/index');
        $dashboard->assertStatus(200)->assertSee('Home');

        //verificar logout
        $logout = $this->get(route('admin.logout'));
        $logout->assertStatus(302)->assertRedirect('/');

        //verificar que no se puede acceder a la vista dashboard
        $dashboard = $this->get('admin/index');
        $dashboard->assertStatus(302)->assertRedirect('login');
    }
}

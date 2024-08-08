<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Pablo Velasquez';
        $user->email = 'pabloavelasquez@gmail.com';
        $user->password = bcrypt('password');
        $user->image = 'user-image.png';
        $user->save();

        $user = new User();
        $user->name = 'Jane Doe';
        $user->email = 'janedoe@test.com';
        $user->password = bcrypt('password');
        $user->image = 'user-image1.png';
        $user->save();

    }
}

<?php

namespace Database\Seeders;

use App\Models\Admin\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new Admin();
        $admin->name = 'Pablo Velasquez';
        $admin->email = 'pabloavelasquez@gmail.com';
        $admin->password = bcrypt('password');
        $admin->save();
    }
}

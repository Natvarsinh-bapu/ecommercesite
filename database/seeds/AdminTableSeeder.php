<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Admin',
            'email' => 'natvarsinh1112@gmail.com',
            'password' => \bcrypt('3YbJUc88LEAGwTz')
        ]);
    }
}

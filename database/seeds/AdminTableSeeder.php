<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => Str::random(10),
            'email' => 'pronelame@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('password'),
        ]);
    }
}

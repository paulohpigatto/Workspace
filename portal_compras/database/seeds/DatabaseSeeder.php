<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'Paulo Pigatto',
        'role' => 5,
        'login' => 'paulo',
        'email' => 'paulo.pigatto@grupoambipar.com.br',
        'password' => bcrypt('123456'),
       ]);
    }
}

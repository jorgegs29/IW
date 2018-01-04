<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(NoticiasTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(MensajesTableSeeder::class);
        $this->call(JuegosTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() !== 'production') {
            DB::table('categorias')->delete();
            DB::table('categorias')->insert(['nombre' => 'Accion']);
            DB::table('categorias')->insert(['nombre' => 'Carreras']);
            DB::table('categorias')->insert(['nombre' => 'Deportes']);
            DB::table('categorias')->insert(['nombre' => 'Estrategia']);
            DB::table('categorias')->insert(['nombre' => 'Indie']);
            DB::table('categorias')->insert(['nombre' => 'Rol']);
            DB::table('categorias')->insert(['nombre' => 'Aventura']);
            DB::table('categorias')->insert(['nombre' => 'Casual']);
            DB::table('categorias')->insert(['nombre' => 'Early Access']);
            DB::table('categorias')->insert(['nombre' => 'Free to Play']);
            DB::table('categorias')->insert(['nombre' => 'Multijugador masivo']);
            DB::table('categorias')->insert(['nombre' => 'Simuladores']);
    	}
    }
}

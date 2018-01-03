<?php

use Illuminate\Database\Seeder;

class JuegosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() !== 'production') {
	        DB::table('juegos')->delete();
    		factory(App\Juego::class, 20)->create();	
    	}
    }
}

<?php

use Illuminate\Database\Seeder;

class NoticiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() !== 'production') {
	        DB::table('noticias')->delete();
    		factory(App\Noticia::class, 20)->create();	
    	}
    }
}

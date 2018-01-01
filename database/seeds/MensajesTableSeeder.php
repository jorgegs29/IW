<?php

use Illuminate\Database\Seeder;

class MensajesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() !== 'production') {
	        DB::table('mensajes')->delete();
    		factory(App\Mensaje::class, 40)->create();	
    	}
    }
}

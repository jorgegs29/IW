<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() !== 'production') {
	        DB::table('users')->delete();
    		factory(App\User::class, 10)->create();	
    	}
    }
}

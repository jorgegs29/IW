<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() !== 'production') {
	        DB::table('posts')->delete();
    		factory(App\Post::class, 20)->create();	
    	}
    }
}

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
        factory(App\Post::class, 100)->create();

//        $faker = Faker\Factory::create();
//        foreach(range(1,100) as $i){
//
//            $post = new App\Post();
//            $post->created_by = App\User::all()->random()->id;
//            $post->title = $faker->words(4, true);
//            $post->content = $faker->sentence();
//            $post->url = $faker->url;
//            $post->save();
//
//        }
    }
}

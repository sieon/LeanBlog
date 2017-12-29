<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         $user_ids = ['1','2','3'];
         $faker = app(Faker\Generator::class);

         $posts = factory(Post::class)->times(100)->make()->each(function ($post) use ($faker, $user_ids) {
             $post->user_id = $faker->randomElement($user_ids);
         });

         Post::insert($posts->toArray());
     }
}

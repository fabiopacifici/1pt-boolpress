<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Post;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for ($i = 0; $i < 10; $i++) {
            $post = new Post();
            $post->title = $faker->words(4, true); // learn laravel 11
            $post->content = $faker->text();
            $post->slug = Str::of($post->title)->slug('-'); //learn-laravel-11
            $post->save();
        }
    }
}

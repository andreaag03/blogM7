<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('es_ES');

        $posts = Post::all();

        foreach ($posts as $post) {
            $users = User::inRandomOrder()->limit(rand(3, 7))->get();

            foreach ($users as $user) {
                Comment::create([
                    'comment' => $faker->sentence(rand(6, 20)),
                    'post_id' => $post->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}

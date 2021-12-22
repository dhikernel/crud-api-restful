<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        $posts = [
            [
                'id_user'         => '1',
                'title'           => 'Post 1',
                'content'         => 'conteúdo 1'
            ],
            [
                'id_user'         => '2',
                'title'           => 'Post 2',
                'content'          => 'Conteúdo 2'
            ],
        ];

        Post::insert($posts);
    }
}

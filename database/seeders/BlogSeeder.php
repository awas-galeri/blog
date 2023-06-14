<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Blog::create([
        //     'title' => 'Testing Blog',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, cum.',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet ullam magni similique vero atque. Ex culpa repudiandae assumenda tempora nam velit non corporis, fugit repellat molestias, animi at sit qui!'
        // ]);

        Blog::factory(10)->create();
    }
}

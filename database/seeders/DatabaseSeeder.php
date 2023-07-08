<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::truncate();
        // Category::truncate();
        // Blog::truncate();

        $frontend=Category::factory()->create([
            'name' => 'Frontend',
            'slug' => 'frontend'
        ]);
        $backend=Category::factory()->create([
            'name' => 'Backend',
            'slug' => 'backend'
        ]);

        $aung=User::factory()->create([
            'name' => 'Aung Aung',
            'userName' => 'aungaung',
            'password' => '11111111'
        ]);
        $kyaw=User::factory()->create([
            'name' => 'Kyaw Kyaw',
            'userName' => 'kyawkyaw',
            'password' => '11111111'
        ]);
        $aung=User::factory()->create([
            'name' => 'Jasper',
            'userName' => 'jasper',
            'password' => '11111111'
        ]);
        $kyaw=User::factory()->create([
            'name' => 'Willian',
            'userName' => 'willian',
            'password' => '11111111'
        ]);

        Blog::factory(2)->create([
            'category_id' => $frontend->id,
            'user_id' => $aung->id
        ]);
        Blog::factory(2)->create([
            'category_id' => $backend->id,
            'user_id' => $kyaw->id
        ]);

        // $frontend = Category::create([
        //     'name' => 'Frontend',
        //     'slug' => 'frontend'
        // ]);
        // $backend = Category::create([
        //     'name' => 'Backend',
        //     'slug' => 'backend'
        // ]);

        // Blog::create([
        //     'title' => 'Frontend post',
        //     'slug' => 'frontend-post',
        //     'category_id' => $frontend->id,
        //     'intro' => 'This is intro',
        //     'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique sapiente soluta perferendis enim ex at optio, nis
        //     i dolorem. Illum assumenda a eum corporis dolor aliquid quibusdam reiciendis. Laboriosam, placeat tempore.'
        // ]);

        // Blog::create([
        //     'title' => 'Backend post',
        //     'slug' => 'backend-post',
        //     'category_id' => $backend->id,
        //     'intro' => 'This is intro',
        //     'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique sapiente soluta perferendis enim ex at optio, nis
        //     i dolorem. Illum assumenda a eum corporis dolor aliquid quibusdam reiciendis. Laboriosam, placeat tempore.'
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

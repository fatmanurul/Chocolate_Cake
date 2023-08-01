<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;  
use App\Models\Categories;  
use App\Models\Article;  
use App\Models\Comments;  

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UsersSeeder::class,
            CategoriesSeeder::class,
            ArticlesSeeder::class,
            CommentsSeeder::class,
        ]);
    }
}

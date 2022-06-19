<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Staff;
use Illuminate\Database\Seeder;
use Database\Factories\PostFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Post::factory(100) -> create(); 
        Staff::factory(50) -> create();
      


    }
}

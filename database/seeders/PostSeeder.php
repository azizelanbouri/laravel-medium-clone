<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Clap;
use App\Models\Category;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // Create categories
        $categories = ['Technology', 'Sports', 'Science', 'Health', 'Travel', 'Food', 'Business', 'Entertainment'];
        
        foreach ($categories as $categoryName) {
            Category::firstOrCreate(['name' => $categoryName]);
        }

        // Create users
        $users = User::factory()->count(10)->create();

        // Create posts
        $posts = Post::factory()->count(25)->create();

        // Add claps to posts
        foreach ($posts as $post) {
            $randomUsers = $users->random(rand(2, 8));
            
            foreach ($randomUsers as $user) {
                // Make sure user doesn't clap their own post
                if ($user->id !== $post->user_id) {
                    Clap::create([
                        'user_id' => $user->id,
                        'post_id' => $post->id,
                        'claps_count' => rand(1, 15),
                    ]);
                }
            }
        }

        // Create a specific test user
        $testUser = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'username' => 'testuser',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        // Create some posts for test user
        Post::factory()->count(3)->create([
            'user_id' => $testUser->id,
        ]);

        $this->command->info('Successfully generated:');
        $this->command->info('- 10 users');
        $this->command->info('- 28 posts (25 random + 3 test user)');
        $this->command->info('- Posts with claps from multiple users');
        $this->command->info('Test user: test@example.com / password');
    }
}
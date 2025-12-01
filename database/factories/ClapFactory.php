<?php

namespace Database\Factories;

use App\Models\Clap;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClapFactory extends Factory
{
    protected $model = Clap::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'post_id' => Post::factory(),
            'claps_count' => $this->faker->numberBetween(1, 20),
        ];
    }
}
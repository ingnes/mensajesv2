<?php

namespace Database\Factories;
use App\Models\Message;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MessageFactory extends Factory
{
    
    protected $model = Message::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'nombre' => fake()->text(30),
           'email'  => fake()->unique()->text(30),
           'mensaje' => fake()->text(250),
           'phone' => fake()->text(30),
        ];
    }
}

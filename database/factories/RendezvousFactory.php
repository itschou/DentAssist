<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rendezvous>
 */
class RendezvousFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_debut' => fake()->dateTimeBetween('-1 week', '+1 week'),
            'date_fin' => function (array $attributes) {
                $dateDebut = $attributes['date_debut'];
                $dateFin = Carbon::parse($dateDebut)->addMinutes(fake()->numberBetween(45, 90));

                return $dateFin;
            },
            'comments' => fake()->sentence(),
            'user_id' => User::factory()->create()->id,

        ];
    }
}
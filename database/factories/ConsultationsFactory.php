<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Arr;
use Carbon\Carbon;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consultations>
 */
class ConsultationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $typeConsultations = Categories::pluck('nom')->toArray();

        $year = Carbon::now()->year;

        // Générer un mois aléatoire entre 1 et 12
        $month = fake()->numberBetween(1, 12);

        // Créer une instance Carbon pour représenter la date
        $date = Carbon::create($year, $month, 1);

        return [
            'date' => $date,
            'type_consultation' => Arr::random($typeConsultations),
            'motif_consultation' => fake()->sentence(),
            'prix_consultation' => fake()->numberBetween(500, 3000),
            'prix_payé_consultation' => fake()->numberBetween(250, 2500),
            'prix_reste_consultation' => function (array $attributes) {
                $prix_consultation = $attributes['prix_consultation'];
                $prix_payé_consultation = $attributes['prix_payé_consultation'];
                return $prix_consultation - $prix_payé_consultation;
            },
            'procedures_effectué' => fake()->sentence(),
            'prescription' => fake()->sentence(),
            'observation' => fake()->sentence(),
            'user_id' => User::factory()->create()->id,
        ];
    }
}
<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Categories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Création du user principale

        \App\Models\User::factory()->create([
            'nom' => env('DOC_NOM'),
            'prenom' => env('DOC_PRENOM'),
            'Date_de_naissance' => 'Non renseigné',
            'telephone' => 'Non renseigné',
            'adresse' => 'Non renseigné',
            'role' => 'Docteur',
            'genre' => env('DOC_GENRE'),
            'maladies' => 'Non renseigné',
            'informations_suplementaires' => 'Non renseigné',
            'email' => env('DOC_EMAIL'),
            'password' => Hash::make(env('DOC_PASS'))
        ]);

        \App\Models\User::factory()->create([
            'nom' => env('ASSIST_NOM'),
            'prenom' => env('ASSIST_PRENOM'),
            'Date_de_naissance' => 'Non renseigné',
            'telephone' => 'Non renseigné',
            'adresse' => 'Non renseigné',
            'role' => 'Assistante',
            'genre' => env('ASSIST_GENRE'),
            'maladies' => 'Non renseigné',
            'informations_suplementaires' => 'Non renseigné',
            'email' => env('ASSIST_EMAIL'),
            'password' => Hash::make(env('ASSIST_PASS'))
        ]);

        // Création des catégories


        $categories = [
            ['nom' => 'Soins'],
            ['nom' => 'Détartrage'],
            ['nom' => 'Blanchiment'],
        ];
        
        Categories::factory()->createMany($categories);

        // A supprimer après prod
        \App\Models\User::factory(40)->create();
        \App\Models\Consultations::factory(80)->create();
        \App\Models\Rendezvous::factory(20)->create();


        
    }
}

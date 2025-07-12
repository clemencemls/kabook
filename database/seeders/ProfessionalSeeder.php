<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Professional;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfessionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {

        $animalCategoryMap = [
            'Chat' => '1574e1d6-d7ba-420d-a7ab-f5e8945524ab',
            'Chien' => 'b16ca8c3-ddaa-478a-a02b-e8cdbb3fa765',
            'NAC' => '056b8d4f-2c0e-4b0a-be9f-b15e2ce837f5',
        ];

        $jobCategoryMap = [
            'Comportementaliste' => '93c14dec-cd02-4dd7-9b83-b130d49251ea',
            'Ostéopathe' => '1b4fb4a2-1cfc-4edf-ac79-5f4352807ffd',
            'Toiletteur' => 'eead3f79-a064-4056-8b75-39d211581d79',
        ];

        // Création des utilisateurs (users)
        $userSophie = User::create([
            'email' => 'sophie@example.com',
            'password' => Hash::make('1234'),
            'role' => 'user',
        ]);

        $userPierre = User::create([
            'email' => 'pierre@example.com',
            'password' => Hash::make('1234'),
            'role' => 'user',
        ]);

        // Création des professionals liés aux users
        $sophie = Professional::create([
            'first_name' => 'Sophie',
            'last_name' => 'Bernard',
            'slug' => Str::slug('Sophie Bernard') . '-' . Str::random(5),
            'is_mobile' => true,
            'is_validated' => true,
            'user_id' => $userSophie->id,
        ]);

        $pierre = Professional::create([
            'first_name' => 'Pierre',
            'last_name' => 'Martin',
            'slug' => Str::slug('Pierre Martin') . '-' . Str::random(5),
            'is_mobile' => false,
            'is_validated' => true,
            'user_id' => $userPierre->id,
        ]);

        // Associations catégories animaux et métiers
        $sophie->animalCategories()->syncWithoutDetaching([
            $animalCategoryMap['Chat'],
        ]);

        $sophie->jobCategories()->syncWithoutDetaching([
            $jobCategoryMap['Comportementaliste'],
        ]);

        $pierre->animalCategories()->syncWithoutDetaching([
            $animalCategoryMap['Chien'],
            $animalCategoryMap['Chat'],
            $animalCategoryMap['NAC'],
        ]);

        $pierre->jobCategories()->syncWithoutDetaching([
            $jobCategoryMap['Ostéopathe'],
            $jobCategoryMap['Toiletteur'],
        ]);
    }
}


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
            'Chat' => 'c49fdeb4-f2a0-4190-a013-81cbeff1a5e0',
            'Chien' => '5e517b50-0647-453b-b4a4-d65aaead9225',
            'NAC' => '5e61a645-56c3-41a2-a53f-9181496911d6',
        ];

        $jobCategoryMap = [
            'Comportementaliste' => 'da63891a-45e8-4a3c-a60c-0b4fe933b91c',
            'Ostéopathe' => 'ea691045-cf91-4633-a2b8-a072c46b37a5',
            'Toiletteur' => 'e395bac0-5df7-4d66-b58a-46c1fef073b3',
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


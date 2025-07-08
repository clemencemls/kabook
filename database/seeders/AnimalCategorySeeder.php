<?php

namespace Database\Seeders;

use App\Models\AnimalCategory;
use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AnimalCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Chien',
            'Chat',
            'Cheval',
            'NAC',
            'Ferme'
        ];

        foreach ($categories as $name) {
            AnimalCategory::create([
                'id' => Str::uuid(),
                'name' => $name
            ]);
        }
    }
}

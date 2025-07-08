<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\JobCategory;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = [
            'Comportementaliste',
            'Ostéopathe',
            'Éducateur',
            'Naturopathe',
            'Toiletteur',
        ];

        foreach ($categories as $name) {
            JobCategory::create([
                'id' => Str::uuid(),
                'name' => $name
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\CityMunicipality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CityMunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            "Alfonso",
            "Amadeo",
            "Bacoor",
            "Carmona",
            "Cavite",
            "Dasmariñas",
            "General Emilio Aguinaldo",
            "General Trias",
            "Imus",
            "Indang",
            "Kawit",
            "Magallanes",
            "Maragondon",
            "Mendez",
            "Naic",
            "Noveleta",
            "Rosario",
            "Silang",
            "Tagaytay",
            "Tanza",
            "Ternate",
            "Trece Martires",
            "General Mariano Alvarez",
        ];

        foreach ($items as $name) {
            $this->command->info("Seeding city/municipality: {$name}");
            try {
            $model = CityMunicipality::firstOrCreate(['name' => $name]);

            if ($model->wasRecentlyCreated) {
                $this->command->info("Created: {$model->id} - {$model->name}");
                \Log::info('CityMunicipality created', ['id' => $model->id, 'name' => $model->name]);
            } else {
                $this->command->info("Exists: {$model->id} - {$model->name}");
                \Log::info('CityMunicipality exists', ['id' => $model->id, 'name' => $model->name]);
            }
            } catch (\Throwable $e) {
            $this->command->error("Failed to seed {$name}: " . $e->getMessage());
            \Log::error('Failed to seed CityMunicipality', ['name' => $name, 'error' => $e->getMessage()]);
            }
        }
    }
}

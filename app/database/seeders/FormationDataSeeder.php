<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use League\Csv\Reader;

class FormationDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Chemin vers le fichier CSV
        $csvFile = base_path('database/data/formation_data.csv');

        // Lire le fichier CSV
        if (File::exists($csvFile)) {
            $csv = Reader::createFromPath($csvFile, 'r');
            $csv->setHeaderOffset(0); // On considère la première ligne comme en-tête

            foreach ($csv as $record) {
                DB::table('nature_livrables')->insert([
                    'nom' => $record['nom'],
                    'description' => $record['description'],
                    // Ajoutez d'autres colonnes si nécessaire
                ]);
            }
        } else {
            echo "Le fichier CSV n'existe pas!";
        }
    }
}

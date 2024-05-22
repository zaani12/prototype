<?php

namespace Database\Seeders\pkg_realisation_projet;

use App\Models\pkg_projets\Projet;
use App\Models\pkg_projets\Tache;
use App\Models\pkg_realisation_projet\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('database/data/pkg_realisation_projet/messages.csv'), 'r');
        if ($csvFile === false) {
            throw new \Exception('Could not open the CSV file.');
        }


        $firstline = true;
        while (($data = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
            if (!$firstline) {

                Message::create([
                    'titre' => $data[0],
                    'description' => $data[1],
                    'projet_id' => $data[2],
                    'tach_id' => $data[3],
                    'isLue' => filter_var($data[4], FILTER_VALIDATE_BOOLEAN),
                ]);
            }
            $firstline = false;
        }


        fclose($csvFile);
    }
}

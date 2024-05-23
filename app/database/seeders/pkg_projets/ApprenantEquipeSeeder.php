<?php

namespace Database\Seeders;

use Log;
use App\Models\pkg_rh\Personne;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class ApprenantEquipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('apprenant_equipe')->truncate();
        Schema::enableForeignKeyConstraints();

        // Ensure the 'Personne' table has some records
        if (Personne::count() == 0) {
            Personne::insert([
                [
                    'id' => 1,
                    'nom' => 'Default person 1',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 2,
                    'nom' => 'Default person 2',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }

        // Open the CSV file
        $csvFile = fopen(base_path("database/data/pkg_projets/apprenantEquipe.csv"), "r");
        $firstline = true;

        // Read the CSV file line by line
        while (($data = fgetcsv($csvFile)) !== false) {
            if (!$firstline) {
                // Check if apprenant_id and equipe_id exist before inserting
                $apprenantExists = DB::table('apprenants')->where('id', $data[0])->exists();
                $equipeExists = DB::table('equipes')->where('id', $data[1])->exists();

                if ($apprenantExists && $equipeExists) {
                    DB::table('apprenant_equipe')->insert([
                        'equipe_id' => $data[0],
                        'apprenant_id' => $data[1],
                        'created_at' => $data[2],
                        'updated_at' => $data[3],
                    ]);
                } else {
                    // Log the missing apprenant_id or equipe_id
                    if (!$apprenantExists) {
                        Log::warning("Apprenant ID {$data[0]} does not exist. Skipping record.");
                    }
                    if (!$equipeExists) {
                        \Log::warning("Equipe ID {$data[1]} does not exist. Skipping record.");
                    }
                }
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}


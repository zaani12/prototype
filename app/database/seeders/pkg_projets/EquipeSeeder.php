<?php

namespace Database\Seeders\pkg_projets;

use App\Models\pkg_projets\Equipe;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;


class EquipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Equipe::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_projets/equipes.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Equipe::create([
                    'nom' => $data[0],
                    'description' => $data[1],
                    'projet_id' => $data[2],
                    'created_at' => $data[3],
                    'updated_at' => $data[4],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}

<?php

namespace Database\Seeders\pkg_competences;

use App\Models\pkg_competences\Technologie;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\pkg_notifications\Notification;
use Spatie\Permission\Models\Permission;

class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        Technologie::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_competences/technologies/Technologies.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Technologie::create([
                    "nom" => $data['0'],
                    "description" => $data['1'],
                    "categorie_technologies_id" => $data['2'],
                    "competence_id" => $data['3'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);


        Schema::disableForeignKeyConstraints();
        Permission::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_competences/technologies/TechnologiesPermissions.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Permission::create([
                    "name" => $data['0'],
                    "guard_name" => $data['1'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
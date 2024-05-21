<?php

namespace Database\Seeders\pkg_realisation_projet;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\pkg_realisation_projet\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $csvFile = fopen(base_path("database/data/pkg_realisation_projet/messages.csv"), "r");
        if ($csvFile === false) {
            throw new \Exception("Could not open the CSV file.");
        }

        $firstline = true;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Message::create([
                    "titre" => $data[0],
                    "description" => $data[1],
                    "isLue" => $data[2],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}

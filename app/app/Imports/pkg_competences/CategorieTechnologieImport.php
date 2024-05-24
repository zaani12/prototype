<?php

namespace App\Imports\pkg_competences;

use App\Models\pkg_competences\CategorieTechnologie;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use App\Models\pkg_competences\Technologie;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategorieTechnologieImport implements ToModel, WithHeadingRow
{
    // Implement the method to check if a CategorieTechnologie already exists in the application
    private function CategorieTechnologieExists(array $row): bool
    {
        // Logic to check if a CategorieTechnologie with the same attributes exists in the database
        // For example, you can check if a CategorieTechnologie with the same name and dates already exists
        $existingCategorieTechnologie = CategorieTechnologie::where('nom', $row['nom'])
            ->exists();
        return $existingCategorieTechnologie;
    }

    // Implement the model() method to import CategorieTechnologies
    public function model(array $row)
    {
        // Check if the CategorieTechnologie already exists in the application
        if ($this->CategorieTechnologieExists($row)) {
            // CategorieTechnologie already exists, skip importing it
            return null;
        }

        // CategorieTechnologie doesn't exist, proceed with importing it
        return new CategorieTechnologie([
            'nom' => $row["nom"],
            'description' => $row["description"],
        ]);
    }

}
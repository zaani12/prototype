<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Symfony\Component\Uid\NilUuid;

use Database\Seeders\pkg_competences\{
    CompetenceSeeder ,
    NiveauCompetencesSeeder,
    CategorieTechnologies , 
};


class CompetencesSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(CompetencesSeeder::Classes());
    }

    public static function Classes(): array
    {
        return [
            CompetenceSeeder::class,
            NiveauCompetencesSeeder::class,
            CategorieTechnologies::class,
        ];
    }
}

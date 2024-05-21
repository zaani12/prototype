<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Symfony\Component\Uid\NilUuid;

use Database\Seeders\pkg_projets\{
    StatutTacheSeeder,
    EquipeSeeder,
    ProjetSeeder,
    
};


class ProjetsSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(ProjetsSeeder::Classes());
    }

    public static function Classes(): array
    {
        return [
            StatutTacheSeeder::class,
            EquipeSeeder::class,
            ProjetSeeder::class,
        ];
    }
}



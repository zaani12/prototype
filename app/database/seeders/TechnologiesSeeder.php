<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Symfony\Component\Uid\NilUuid;

use Database\Seeders\pkg_technologies\{
    ProjetsSeeder,
};


class TechnologiesSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(TechnologiesSeeder::Classes());
    }

    public static function Classes(): array
    {
        return [
            ProjetsSeeder::class,
        ];
    }
}
<?php

namespace Database\Seeders\pkg_realisation_projet;


use Illuminate\Database\Seeder;
use App\Models\pkg_realisation_projet\NatureLivrable;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;


class NatureLivrableSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        NatureLivrable::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_realisation_projet/nature-livrable.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if ($firstline) {
                $firstline = false;
                continue;
            }

            if (count($data) < 2) {
                continue;
            }

            $existingNatureLivrable = NatureLivrable::where('nom', $data[0])
                ->where('description', $data[1])
                ->first();

            if (!$existingNatureLivrable) {
                NatureLivrable::create([
                    "nom" => $data[0],
                    "description" => $data[1]
                ]);
            }
        }

        fclose($csvFile);

        $permissions = $this->readPermissionsFromCSV();
        foreach ($permissions as $permissionName) {
            $existingPermission = Permission::where('name', $permissionName)->first();
            if (!$existingPermission) {
                Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
            }
        }

        $formateurRole = Role::where('name', 'formateur')->first();
        if ($formateurRole) {
            $formateurRole->givePermissionTo($permissions);
        }
    }

    private function readPermissionsFromCSV(): array
    {
        $permissionsArray = [];

        $csvFilePermissions = fopen(base_path("database/data/pkg_realisation_projet/Permissions.csv"), "r");

        fgetcsv($csvFilePermissions); // Skip the header row

        while (($data = fgetcsv($csvFilePermissions)) !== FALSE) {
            $permissionsArray[] = $data[0];
        }

        fclose($csvFilePermissions);

        return $permissionsArray;
    }
}



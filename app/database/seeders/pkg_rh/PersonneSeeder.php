<?php

namespace Database\Seeders\pkg_rh;

use App\Models\pkg_rh\Personne;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PersonneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $AdminRole = User::ADMIN;

        Schema::disableForeignKeyConstraints();
        Personne::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_rh/Personnes.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if ($firstline) {
                $firstline = false;
                continue;
            }

            // Check if the row has the expected number of columns
            if (count($data) < 6) {
                continue;
            }

            Personne::create([
                "nom" => $data[0],
                "prenom" => $data[1],
                "type" => $data[2],
                "created_at" => $data[3],
                "updated_at" => $data[4],
                "groupe_id" => $data[5],
            ]);
        }

        fclose($csvFile);

        $actions = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy', 'export', 'import'];
        foreach ($actions as $action) {
            $permissionName = $action . '-' . "ProjetController";
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }

        $projectManagerRolePermissions = [
            'index-PersonneController',
            'show-PersonneController',
            'create-PersonneController',
            'store-PersonneController',
            'edit-PersonneController',
            'update-PersonneController',
            'destroy-PersonneController',
            'export-PersonneController',
            'import-PersonneController'
        ];

        $admin = Role::where('name', $AdminRole)->first();

        if ($admin) {
            $admin->givePermissionTo($projectManagerRolePermissions);
        }
    }
}

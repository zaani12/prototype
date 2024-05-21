<?php

namespace Database\Seeders\pkg_autorisations;

use App\Models\pkg_autorisations\Autorisation;
use App\Models\pkg_autorisations\Permission;
use App\Models\pkg_autorisations\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AutorisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $AdminRole = User::ADMIN;
        $MembreRole = User::APPRENANT;

        Schema::disableForeignKeyConstraints();
        Autorisation::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_autorisations/Autorisations.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {


            if (!$firstline) {
                Autorisation::create([

                    
                        "id"=>$data[0],
                    
                        "nom"=>$data[1],
                    
                        "action_id"=>$data[2],

                        "role_id"=>$data[3],
                                        
                        "created_at"=>$data[4],
                    
                        "updated_at" => $data[5] ?? null,                    
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
        $Autorisations = ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy', 'export', 'import'];
        foreach ($Autorisations as $Autorisation) {
            $permissionName = $Autorisation . '-' . "TachesController";
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }

        $tachesManagerRolePermissions = [
            'index-TachesController',
            'show-TachesController',
            'create-TachesController',
            'store-TachesController',
            'edit-TachesController',
            'update-TachesController',
            'destroy-TachesController',
            'export-TachesController',
            'import-TachesController'
        ];

        $tachesMembreRolePermissions = [
            'index-TachesController',
            'show-TachesController',
        ];

        $admin = Role::where('name', $AdminRole)->first();
        $membre = Role::where('name', $MembreRole)->first();

        $admin->givePermissionTo($tachesManagerRolePermissions);
        $membre->givePermissionTo($tachesMembreRolePermissions);

    }
}

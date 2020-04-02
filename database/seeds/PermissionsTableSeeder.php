<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Permission Types
         *
         */

        $Permissionitems = [
            [
                'name'        => 'Can View Users',
                'slug'        => 'view.users',
                'description' => 'Can view users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Users',
                'slug'        => 'create.users',
                'description' => 'Can create new users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Users',
                'slug'        => 'edit.users',
                'description' => 'Can edit users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Users',
                'slug'        => 'delete.users',
                'description' => 'Can delete users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Doctors',
                'slug'        => 'view.doctors',
                'description' => 'Can view doctors',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Doctors',
                'slug'        => 'create.doctors',
                'description' => 'Can create new doctors',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Doctors',
                'slug'        => 'edit.doctors',
                'description' => 'Can edit doctors',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Doctors',
                'slug'        => 'delete.doctors',
                'description' => 'Can delete doctors',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Specialties',
                'slug'        => 'view.specialties',
                'description' => 'Can view specialties',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Specialties',
                'slug'        => 'create.specialties',
                'description' => 'Can create new specialties',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Specialties',
                'slug'        => 'edit.specialties',
                'description' => 'Can edit specialties',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Specialties',
                'slug'        => 'delete.specialties',
                'description' => 'Can delete specialties',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Patients',
                'slug'        => 'view.patients',
                'description' => 'Can view patients',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Patients',
                'slug'        => 'create.patients',
                'description' => 'Can create new patients',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Patients',
                'slug'        => 'edit.patients',
                'description' => 'Can edit patients',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Schedules',
                'slug'        => 'delete.patients',
                'description' => 'Can delete patients',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can View Schedules',
                'slug'        => 'view.schedules',
                'description' => 'Can view schedules',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Schedules',
                'slug'        => 'create.schedules',
                'description' => 'Can create new schedules',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Schedules',
                'slug'        => 'edit.schedules',
                'description' => 'Can edit schedules',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Schedules',
                'slug'        => 'delete.schedules',
                'description' => 'Can delete schedules',
                'model'       => 'Permission',
            ],
        ];

        /*
         * Add Permission Items
         *
         */
        foreach ($Permissionitems as $Permissionitem) {
            $newPermissionitem = config('roles.models.permission')::where('slug', '=', $Permissionitem['slug'])->first();
            if ($newPermissionitem === null) {
                $newPermissionitem = config('roles.models.permission')::create([
                    'name'          => $Permissionitem['name'],
                    'slug'          => $Permissionitem['slug'],
                    'description'   => $Permissionitem['description'],
                    'model'         => $Permissionitem['model'],
                ]);
            }
        }
    }
}

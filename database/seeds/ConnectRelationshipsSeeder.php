<?php

use Illuminate\Database\Seeder;

class ConnectRelationshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Get Available Permissions.
         */
        $permissions = config('roles.models.permission')::all();

        /**
         * Attach Permissions to Roles.
         */
        $roleAdmin = config('roles.models.role')::where('name', '=', 'Admin')->first();
        foreach ($permissions as $permission) {
            $roleAdmin->attachPermission($permission);
        }

        $roleAdmin = config('roles.models.role')::where('name', '=', 'User')->first();
        foreach ($permissions as $permission) {
            $roleAdmin->attachPermission($permission);
        }

        $permissionsdoctors = config('roles.models.permission')::where('slug','LIKE','%patients')->orwhere('slug','LIKE','%schedules')->get();

        $roleAdmin = config('roles.models.role')::where('name', '=', 'Doctor')->first();
        foreach ($permissionsdoctors as $permission) {
            $roleAdmin->attachPermission($permission);
        }

        $permissionspatients = config('roles.models.permission')::where('slug','LIKE','%doctors')->orwhere('slug','LIKE','%schedules')->get();

        $roleAdmin = config('roles.models.role')::where('name', '=', 'Patient')->first();
        foreach ($permissionspatients as $permission) {
            $roleAdmin->attachPermission($permission);
        }
    }
}

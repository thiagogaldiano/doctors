<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRole = config('roles.models.role')::where('name', '=', 'User')->first();
        $adminRole = config('roles.models.role')::where('name', '=', 'Admin')->first();
        $doctorRole = config('roles.models.role')::where('name', '=', 'Doctor')->first();
        $patientRole = config('roles.models.role')::where('name', '=', 'Patient')->first();
        $permissions = config('roles.models.permission')::all();
        $permissionsdoctors = config('roles.models.permission')::where('slug','LIKE','%patients')->orwhere('slug','LIKE','%schedules')->get();
        $permissionspatients = config('roles.models.permission')::where('slug','LIKE','%doctors')->orwhere('slug','LIKE','%schedules')->get();

        /*
         * Add Users
         *
         */
        if (config('roles.models.defaultUser')::where('email', '=', 'admin@admin.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Admin',
                'email'    => 'admin@admin.com',
                'password' => bcrypt('12345678'),
            ]);

            $newUser->attachRole($adminRole);
            foreach ($permissions as $permission) {
                $newUser->attachPermission($permission);
            }
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'user@user.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'User',
                'email'    => 'user@user.com',
                'password' => bcrypt('password'),
            ]);

            $newUser->attachRole($userRole);
            foreach ($permissions as $permission) {
                $newUser->attachPermission($permission);
            }
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'doctor@doctor.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Doctor',
                'email'    => 'doctor@doctor.com',
                'password' => bcrypt('12345678'),
            ]);

            $newUser->attachRole($doctorRole);
            foreach ($permissionsdoctors as $permission) {
                $newUser->attachPermission($permission);
            }
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'patient@patient.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Patient',
                'email'    => 'patient@patient.com',
                'password' => bcrypt('12345678'),
            ]);

            foreach ($permissionspatients as $permission) {
                $newUser->attachPermission($permission);
            }
        }
    }
}

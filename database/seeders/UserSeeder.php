<?php
# @Date:   2020-11-14T19:44:35+00:00
# @Last modified time: 2020-11-14T19:57:20+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\Role;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name','admin')->first();
        $role_doctor = Role::where('name','doctor')->first();
        $role_patient = Role::where('name','patient')->first();

        $admin = new User();
        $admin->name = 'Cian Gtwo';
        $admin->email = 'admin2@medcen.ie';
        $admin->password = Hash::make('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $doctor = new User();
        $doctor->name = 'John G';
        $doctor->email = 'johnG@medcen.ie';
        $doctor->password = Hash::make('secret');
        $doctor->save();
        $doctor->roles()->attach($role_doctor);

        $patient = new User();
        $patient->name = 'Jane D';
        $patient->email = 'janeD@medcen.ie';
        $patient->password = Hash::make('secret');
        $patient->save();
        $patient->roles()->attach($role_patient);

    }
}

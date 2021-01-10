<?php
# @Date:   2020-11-14T19:14:33+00:00
# @Last modified time: 2020-11-14T19:55:06+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(RoleSeeder::class);
      $this->call(UserSeeder::class);
      $this->call(DoctorSeeder::class);
    }
}

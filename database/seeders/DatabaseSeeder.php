<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      // $this->call(ProductSeeder::class);
      $this->call(UserTableSeeder::class);
      $this->call(RoleTableSeeder::class);
      $this->call(PermissionTableSeeder::class);
      $this->call(RolePermissionTableSeeder::class);
      $this->call(RoleUserTableSeeder::class);
    }
}

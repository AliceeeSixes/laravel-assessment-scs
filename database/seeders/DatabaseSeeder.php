<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(CompanySeeder::class); Unnecessary because EmployeeSeeder also creates companies
        $this->call(EmployeeSeeder::class);
        $this->call(UserSeeder::class);
    }
}

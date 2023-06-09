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
        $this->call(MorrocoCitiesSeeder::class);
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(PlanOptionSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(SuperAdminSeeder::class);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee1;
use App\Models\Employee2;
use App\Models\Employee3;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee1::factory()->count(100000)->create();
        Employee2::factory()->count(100000)->create();
        Employee3::factory()->count(100000)->create();
    }
}

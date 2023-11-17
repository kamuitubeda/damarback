<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('student_permissions')->insert([
                'student_id' => rand(1, 10), // Assuming you have students seeded already
                'teacher_id' => rand(1, 5), // Assuming you have teachers seeded already
                'permission_type' => $faker->randomElement(['home_leave', 'other_permission']),
                'permission_date' => $faker->date,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentAttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('student_attendances')->insert([
                'student_id' => rand(1, 10), // Assuming you have students seeded already
                'attendance_date' => $faker->date,
                'status' => $faker->randomElement(['present', 'absent']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

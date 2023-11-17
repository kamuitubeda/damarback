<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('student_classes')->insert([
                'student_id' => rand(1, 10), // Assuming you have students seeded already
                'classroom_id' => rand(1, 5), // Assuming you have classrooms seeded already
                'year_id' => rand(1, 5), // Assuming you have school years seeded already
                'entry_date' => $faker->date,
                'exit_date' => $faker->optional()->date,
                'created_at' => now(),
                'updated_at' => now(),
                // Add other student class fields as needed
            ]);
        }
    }
}

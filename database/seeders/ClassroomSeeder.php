<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            DB::table('classrooms')->insert([
                'name' => $faker->unique()->randomElement(['Class 7A', 'Class 7B', 'Class 8', 'Class 9', 'Class 10', 'Class 11']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

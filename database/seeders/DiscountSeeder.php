<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('discounts')->insert([
                'student_id' => rand(1, 10), // Assuming you have students seeded already
                'year_id' => rand(1, 5), // Assuming you have school years seeded already
                'discount_type' => $faker->randomElement(['academic', 'financial']),
                'percentage' => $faker->randomFloat(2, 1, 20),
                'start_date' => $faker->date,
                'end_date' => $faker->optional()->date,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

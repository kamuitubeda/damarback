<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RecurringBillingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('recurring_billings')->insert([
                'student_id' => rand(1, 10), // Assuming you have students seeded already
                'billing_id' => rand(1, 10), // Assuming you have billings seeded already
                'frequency' => $faker->randomElement(['monthly', 'half_year', 'yearly']),
                'next_billing_date' => $faker->date,
                'created_at' => now(),
                'updated_at' => now(),
                // Add other recurring billing attributes as needed
            ]);
        }
    }
}

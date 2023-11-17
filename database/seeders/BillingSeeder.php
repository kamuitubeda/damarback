<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BillingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('billings')->insert([
                'student_id' => rand(1, 10), // Assuming you have students seeded already
                'payment_id' => rand(1, 10), // Assuming you have payments seeded already
                'discount_id' => rand(1, 10), // Assuming you have discounts seeded already
                'amount' => $faker->randomFloat(2, 100, 1000),
                'due_date' => $faker->date,
                'payment_status' => $faker->randomElement(['paid', 'unpaid']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

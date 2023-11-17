<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('payments')->insert([
                'student_id' => rand(1, 10), // Assuming you have students seeded already
                'admin_id' => rand(1, 5), // Assuming you have teachers (admins) seeded already
                'payment_type' => $faker->randomElement(['tuition_fee', 'library_fee', 'exam_fee']),
                'amount' => $faker->randomFloat(2, 50, 500),
                'payment_date' => $faker->date,
                'confirmation_status' => $faker->randomElement(['confirmed', 'pending']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

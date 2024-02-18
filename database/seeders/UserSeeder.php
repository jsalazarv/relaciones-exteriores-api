<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
                'name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'birthday' => $faker->date,
                'gender' => $faker->randomElement(['male', 'female']),
                'rfc' => $faker->regexify('[A-Z]{4}[0-9]{6}[A-Z0-9]{3}'),
                'ssn' => $faker->regexify('[0-9]{3}-[0-9]{2}-[0-9]{4}'),
                'salary' => $faker->randomNumber(5),
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

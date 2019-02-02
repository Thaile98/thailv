<?php

use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 100;
        DB::table('careers')->truncate();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('careers')->insert([
                'cre_name' => $faker->text(30),
                'cre_slug' => $faker->text(30),
            ]);
        }
    }
}

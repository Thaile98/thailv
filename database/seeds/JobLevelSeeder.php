<?php

use Illuminate\Database\Seeder;

class JobLevelSeeder extends Seeder
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
        DB::table('job_levels')->truncate();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('job_levels')->insert([
                'jl_name' => $faker->text(20),
                'jl_slug' => $faker->text(20),
            ]);
        }
    }
}

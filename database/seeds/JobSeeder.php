<?php

use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 200;
        DB::table('jobs')->truncate();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('jobs')->insert([
                'job_root_id' => $faker->unique()->numberBetween(1,200),
                'job_root_type' => $faker->numberBetween(1,10),
                'job_title' => $faker->text(50),
                'job_status' => 1,
                'job_expiry_date' => $faker->date,
                'job_salary' => $faker->numberBetween(1,1000)."$ - ".$faker->numberBetween(1,1000)."$",
                'job_address' => $faker->address,
                'job_experience_id' => $faker->numberBetween(1,10),
                'job_career_id' => $faker->numberBetween(1,100),
                'job_type_id' => $faker->numberBetween(1,6),
                'job_num' => $faker->numberBetween(1,1000)." - ".$faker->numberBetween(1,1000),
                'job_level_id' => $faker->numberBetween(1,100),
                'job_diploma' => $faker->text(20),
                'job_gender' => $faker->text(20),
                'job_age' => $faker->numberBetween(18,50)." - ".$faker->numberBetween(18,50),
            ]);
        }
    }
}

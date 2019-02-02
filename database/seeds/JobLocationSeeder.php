<?php

use Illuminate\Database\Seeder;

class JobLocationSeeder extends Seeder
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
        DB::table('job_location')->truncate();
        for ($i = 1; $i <= $limit; $i++) {
            DB::table('job_location')->insert([
                'job_id' => $i,
                'location_id' => $faker->numberBetween(1,63)
            ]);
        }
    }
}

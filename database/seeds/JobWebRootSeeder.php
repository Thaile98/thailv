<?php

use Illuminate\Database\Seeder;

class JobWebRootSeeder extends Seeder
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
        DB::table('job_web_roots')->truncate();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('job_web_roots')->insert([
                'jwr_name' => $faker->domainName,
                'jwr_slug' => $faker->name,
            ]);
        }
    }
}

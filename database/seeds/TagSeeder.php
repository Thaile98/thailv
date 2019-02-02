<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class TagSeeder extends Seeder
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

        for ($i = 0; $i < $limit; $i++) {
            DB::table('tags')->insert([
                'tag_name' => $faker->text(10),
                'tag_type' => $faker->numberBetween(1,5),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class CategoryMutilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('category_mutilples')->insert([
                'cat_parent_id' => $faker->numberBetween(1,2),
                'cat_name' => $faker->name,
                'cat_slug' => $faker->name,
                'cat_meta_title' => $faker->text(50),
                'cat_meta_description' => $faker->text(100),
                'cat_meta_keyword' => $faker->text(30),
                'cat_avatar' => $faker->text(10),
                'cat_type' => $faker->numberBetween(1,3),
                'cat_status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

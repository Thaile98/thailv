<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ArticlesTableSeeder extends Seeder
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

        for ($i = 0; $i < $limit; $i++) {
            DB::table('articles')->insert([
                'art_cate_id' => $faker->numberBetween(1,10),
                'art_name' => $faker->text(100),
                'art_meta_title' => $faker->text(100),
                'art_meta_keyword' => $faker->text(50),
                'art_meta_description' => $faker->text(150),
                'art_avatar' => $faker->text(30),
                'art_author_id' => 2,
                'art_inspec_id' => 2,
                'art_edited_id' => 2,
                'art_status' => 1,
                'art_hit_view' => $faker->numberBetween(1,100),
                'art_hit_share' => $faker->numberBetween(1,100),
                'art_hit_comment' => $faker->numberBetween(1,100),
                'art_published_at' => "2018-10-25 10:04:23",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

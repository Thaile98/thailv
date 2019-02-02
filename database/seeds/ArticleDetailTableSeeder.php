<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ArticleDetailTableSeeder extends Seeder
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
        DB::table('article_details')->truncate();
        for ($i = 1; $i <= $limit; $i++) {
            DB::table('article_details')->insert([
                'art_article_id' => $i,
                'art_content' => $faker->paragraph(10)."<br>".$faker->paragraph(10)."<br>".$faker->paragraph(10)."<br>".$faker->paragraph(10)."<br>".$faker->paragraph(10)."<br>".$faker->paragraph(10)."<br>".$faker->paragraph(10)."<br>".$faker->paragraph(10)."<br>".$faker->paragraph(10)."<br>".$faker->paragraph(10),
            ]);
        }
    }
}

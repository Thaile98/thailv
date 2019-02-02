<?php

use Illuminate\Database\Seeder;

class JobDetailSeeder extends Seeder
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
        DB::table('job_details')->truncate();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('job_details')->insert([
                'jd_job_id' => $faker->unique()->numberBetween(1,200),
                'jd_benefit' => $faker->paragraph(1)."<br>".$faker->paragraph(1)."<br>".$faker->paragraph(1)."<br>".$faker->paragraph(1)."<br>".$faker->paragraph(1),
                'jd_file' => $faker->paragraph(1)."<br>".$faker->paragraph(1)."<br>".$faker->paragraph(1)."<br>".$faker->paragraph(1)."<br>".$faker->paragraph(1),
                'jd_file_language' => $faker->sentence($nbWords = 2, $variableNbWords = true),
                'jd_description' => $faker->paragraph(1)."<br>".$faker->paragraph(1)."<br>".$faker->paragraph(1)."<br>".$faker->paragraph(1)."<br>".$faker->paragraph(1)."<br>".$faker->paragraph(1)."<br>".$faker->paragraph(1)."<br>".$faker->paragraph(1)."<br>".$faker->paragraph(1),
                'jd_require' => $faker->paragraph(1)."<br>".$faker->paragraph(1)."<br>".$faker->paragraph(1)."<br>".$faker->paragraph(1)."<br>".$faker->paragraph(1)."<br>".$faker->paragraph(1)."<br>".$faker->paragraph(1)."<br>".$faker->paragraph(1)."<br>".$faker->paragraph(1),
            ]);
        }
    }
}

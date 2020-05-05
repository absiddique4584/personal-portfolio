<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CreateUsersSeeder::class,
            HomepageTableSeeder::class,
            HobbyTableSeeder::class,
            ServiceTableSeeder::class,
            ParticipationTableSeeder::class,
            ExpertiseTableSeeder::class,
            SliderTableSeeder::class,
            BlogTableSeeder::class,
            InterestTableSeeder::class,
            CategoryTableSeeder::class,
            SubCategoryTableSeeder::class
        ]);

    }
}

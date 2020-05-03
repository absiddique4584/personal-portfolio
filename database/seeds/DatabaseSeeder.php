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
        $this->call(CreateUsersSeeder::class);
        $this->call(HomepageTableSeeder::class);
        $this->call(HobbyTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(ParticipationTableSeeder::class);
        $this->call(ExpertiseTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(BlogTableSeeder::class);
    }
}

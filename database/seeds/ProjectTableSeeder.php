<?php

use Illuminate\Database\Seeder;
use App\Models\Project;
class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach (range(1,6)as  $index){
            Project::create([
                'image'=>$faker->imageUrl(),
                'title'=>$faker->sentence,
                'sub_title'=>$faker->sentence,
                'status'=>$this->getRandomStatus()
            ]);
        }
    }
    public function getRandomStatus(){
        $statuses =array('active','inactive');
        return $statuses[array_rand($statuses)];
    }
}

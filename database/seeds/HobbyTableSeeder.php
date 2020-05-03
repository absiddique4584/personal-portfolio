<?php

use Illuminate\Database\Seeder;
use App\Models\Hobby;
class HobbyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,14)as $index){

            $hobbies = $faker->name;
             Hobby::create([
                'name'=>$hobbies,
                'slug'=>slugify($hobbies),
                'status'=>$this->getRandomStatus()
            ]);
        }
    }
    public function getRandomStatus(){
        $statuses =array('active','inactive');
        return $statuses[array_rand($statuses)];
    }
}

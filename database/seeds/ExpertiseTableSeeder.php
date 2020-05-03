<?php

use Illuminate\Database\Seeder;
use App\Models\Expertise;
class ExpertiseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker=  Faker\Factory::create();
       foreach (range(1,6) as $index){
           Expertise::create([
               'title'=>$faker->word,
               'number'=>$faker->biasedNumberBetween(0,100),
               'status'=>$this->getRandomStatus(),
           ]);
       }
    }
    public function getRandomStatus(){
        $statuses =array('active','inactive');
        return $statuses[array_rand($statuses)];
    }
}

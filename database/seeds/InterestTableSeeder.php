<?php

use Illuminate\Database\Seeder;
use App\Models\Interest;
class InterestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=  Faker\Factory::create();
        foreach (range(1,4) as $index){
            Interest::create([
                'icon'=>$faker->imageUrl(),
                'number'=>$faker->biasedNumberBetween(20,1500),
                'title'=>$faker->word,
                'status'=>$this->getRandomStatus(),
            ]);
        }
    }
    public function getRandomStatus(){
        $statuses =array('active','inactive');
        return $statuses[array_rand($statuses)];
    }
}

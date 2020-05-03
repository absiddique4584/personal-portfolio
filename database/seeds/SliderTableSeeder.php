<?php

use Illuminate\Database\Seeder;
use App\Models\Slider;
class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,5)as $index){
            Slider::create([
                'title'=>$faker->sentence,
                'sub_title'=>$faker->sentence,
                'short_desc'=>$faker->paragraph,
                'image'=>$faker->imageUrl(),
                'start'=>$faker->date(),
                'end'=>$faker->date(),
                'status'=>$this->getRandomStatus()
            ]);
        }
    }

    public function getRandomStatus(){
        $statuses =array('active','inactive');
        return $statuses[array_rand($statuses)];
    }
}

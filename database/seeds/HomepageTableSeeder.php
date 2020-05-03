<?php

use Illuminate\Database\Seeder;
use App\Models\Homepage;
class HomepageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,2)as $index){
            Homepage::create([
                'title'=>$faker->sentence,
                'sub_title'=>$faker->sentence,
                'paragraph'=>$faker->paragraph,
                'image'=>$faker->imageUrl(),
                'status'=>$this->getRandomStatus()
            ]);
        }
    }

    public function getRandomStatus(){
        $statuses =array('active','inactive');
        return $statuses[array_rand($statuses)];
    }
}

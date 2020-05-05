<?php

use Illuminate\Database\Seeder;
use App\Models\SubCategory;
class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,12)as $index){
            SubCategory::create([
                'category_id'=>rand(1,5),
                'title'=> $faker->title,
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

<?php

use Illuminate\Database\Seeder;
use App\Models\Blog;
class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach (range(1,5) as $index){
            Blog::create([
                'name'=>$faker->sentence,
                'title'=>$faker->sentence,
                'desc' =>$faker->paragraph,
                'image'=>$faker->imageUrl(),
                'status'=>$this->getRandomStatus()
            ]);
        }
    }
    public function getRandomStatus(){
        $status = array('active','inactive');
        return $status[array_rand($status)];
    }
}

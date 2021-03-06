<?php

use Illuminate\Database\Seeder;
use App\Models\Service;
class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,6)as $index){

            $services = $faker->name;
            Service::create([
                'icon1'=>$faker->imageUrl(),
                'name'=>$services,
                'short_des'=>$faker->paragraph,
                'icon2'=>$faker->imageUrl(),
                'status'=>$this->getRandomStatus()
            ]);
        }
    }
    public function getRandomStatus(){
        $statuses =array('active','inactive');
        return $statuses[array_rand($statuses)];
    }
}

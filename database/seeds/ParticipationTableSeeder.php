<?php

use Illuminate\Database\Seeder;
use App\Models\Participation;
class ParticipationTableSeeder extends Seeder
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

            Participation::create([
                'name'=>$faker->name,
                'title'=>$faker->sentence,
                'desc'=>$faker->paragraph,
                'year_date'=>$faker->date(),
                'status'=>$this->getRandomStatus()
            ]);
        }
    }
    public function getRandomStatus(){
        $statuses =array('active','inactive');
        return $statuses[array_rand($statuses)];
    }
}

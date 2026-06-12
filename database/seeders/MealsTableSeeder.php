<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $meals = [
            'Colazione',
            'Pranzo',
            'Cena',
            'Spuntino',
            'Merenda'
        ];

        foreach ($meals as $meal) {
            $newMeal = new Meal();

            $newMeal->type = $meal;

            $newMeal->save();

        }
        
    }
}

<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i=0; $i < 5; $i++){

            $newRecipe = new Recipe();

            $newRecipe->name = $faker->sentence();
            $newRecipe->description = $faker->paragraph();
            $newRecipe->kcal = $faker->randomNumber(3, true);
            $newRecipe->pro = $faker->randomNumber(2, true);
            $newRecipe->carb = $faker->randomNumber(2, true);
            $newRecipe->fat = $faker->randomNumber(2, true);
            $newRecipe->prep_time = $faker->sentence(2, true);
            $newRecipe->image = $faker->imageUrl(640, 480, 'food', true);

            $newRecipe->save();
        }
    }
}

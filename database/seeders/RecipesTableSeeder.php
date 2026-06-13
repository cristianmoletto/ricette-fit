<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = [
            
            [
                'name'        => 'Pollo e riso',
                'description' => 'Classico pasto da palestra. Descrizione sommaria dei passaggi per la preparazione',
                'kcal'        => 450,
                'pro'         => 40,
                'carb'        => 50,
                'fat'         => 8,
                'image'       => 'https://www.img1.it',
                'prep_time'   => 20,
            ],
            [
                'name'        => 'Insalata greca',
                'description' => 'Leggera e ricca di vitamine... ecco come si prepara...',
                'kcal'        => 280,
                'pro'         => 10,
                'carb'        => 15,
                'fat'         => 18,
                'image'       => 'https://www.img2.it',
                'prep_time'   => 10,
            ],
            [
                'name'        => 'Salmone al forno',
                'description' => 'Ricco di omega-3 e proteine... ecco come prepararlo..',
                'kcal'        => 380,
                'pro'         => 35,
                'carb'        => 5,
                'fat'         => 22,
                'image'       => 'https://www.img3.it',
                'prep_time'   => 25,
            ],
        ];

        foreach ($recipes as $recipe) {
            Recipe::create($recipe);
        }
    }
}

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

            // --- COLAZIONE E SPUNTINI ---

            [
                'name'        => 'Pancake proteici all\'avena',
                'description' => 'Mescola 80g di fiocchi d\'avena macinati, 2 uova intere, 150g di yogurt greco e un pizzico di lievito. Scalda una padella antiaderente con poco olio di cocco e versa piccoli dischi di impasto. Cuoci 2-3 minuti per lato fino a doratura. Servi con frutta fresca o un filo di miele.',
                'kcal'        => 320,
                'pro'         => 22,
                'carb'        => 42,
                'fat'         => 7,
                'image'       => 'https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445',
                'prep_time'   => 15,
            ],
            [
                'name'        => 'Yogurt greco con frutti di bosco e granola',
                'description' => 'In una ciotola versa 200g di yogurt greco 0% di grassi. Aggiungi 100g di frutti di bosco misti freschi o surgelati (fragole, mirtilli, lamponi). Completa con 30g di granola croccante e un cucchiaino di miele. Ottima fonte di probiotici e antiossidanti per iniziare la giornata.',
                'kcal'        => 220,
                'pro'         => 18,
                'carb'        => 26,
                'fat'         => 5,
                'image'       => 'https://images.unsplash.com/photo-1488477181946-6428a0291777',
                'prep_time'   => 5,
            ],
            [
                'name'        => 'Smoothie proteico banana e mandorle',
                'description' => 'Nel frullatore unisci 1 banana matura, 250ml di latte di mandorla non zuccherato, 30g di proteine in polvere gusto vaniglia, 1 cucchiaio di burro di mandorle e 4-5 cubetti di ghiaccio. Frulla fino a ottenere una consistenza cremosa. Versa in un bicchiere alto e consuma subito come carica pre o post allenamento.',
                'kcal'        => 350,
                'pro'         => 25,
                'carb'        => 42,
                'fat'         => 9,
                'image'       => 'https://images.unsplash.com/photo-1553530666-ba11a7da3888',
                'prep_time'   => 5,
            ],
            [
                'name'        => 'Toast integrale con avocado e uova',
                'description' => 'Tosta 2 fette di pane integrale. Nel frattempo schiaccia metà avocado con una forchetta, aggiusta di sale, pepe e succo di limone. Cuoci 2 uova al tegamino con poco olio extravergine. Spalma l\'avocado sul toast, adagia le uova sopra e completa con peperoncino in scaglie e semi di sesamo. Ricco e saziante.',
                'kcal'        => 380,
                'pro'         => 20,
                'carb'        => 34,
                'fat'         => 18,
                'image'       => 'https://images.unsplash.com/photo-1525351484163-7529414344d8',
                'prep_time'   => 10,
            ],
            [
                'name'        => 'Overnight oats ai mirtilli',
                'description' => 'La sera prima mescola in un barattolo 80g di fiocchi d\'avena, 200ml di latte scremato, 1 cucchiaio di semi di chia e un cucchiaino di miele. Copri e riponi in frigorifero tutta la notte. Al mattino aggiungi 80g di mirtilli freschi e un cucchiaio di yogurt greco. Pronto senza accendere i fornelli.',
                'kcal'        => 290,
                'pro'         => 12,
                'carb'        => 47,
                'fat'         => 6,
                'image'       => 'https://images.unsplash.com/photo-1517093602195-b40af9688f4a',
                'prep_time'   => 5,
            ],
            [
                'name'        => 'Barrette energetiche ai datteri e noci',
                'description' => 'Frulla nel mixer 150g di datteri denocciolati con 80g di noci e 50g di avena. Aggiungi 1 cucchiaio di cacao amaro e un pizzico di sale. Lavora il composto con le mani, stendilo in una teglia rivestita di carta forno allo spessore di 1cm e refrigera per 1 ora. Taglia in 8 barrette. Ideale come spuntino pre-workout.',
                'kcal'        => 180,
                'pro'         => 5,
                'carb'        => 24,
                'fat'         => 7,
                'image'       => 'https://images.unsplash.com/photo-1490567674331-8a0d9bdea6d8',
                'prep_time'   => 15,
            ],

            // --- PRANZI E CENE ---

            [
                'name'        => 'Bowl di quinoa con pollo e verdure',
                'description' => 'Cuoci 80g di quinoa in acqua salata per 15 minuti. Grigliа 150g di petto di pollo tagliato a strisce con aglio e rosmarino. Saltа in padella zucchine e peperoni a cubetti. Componi la bowl con la quinoa alla base, le verdure e il pollo. Condisci con tahini diluita in acqua e limone. Completo ed equilibrato.',
                'kcal'        => 480,
                'pro'         => 42,
                'carb'        => 56,
                'fat'         => 10,
                'image'       => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd',
                'prep_time'   => 25,
            ],
            [
                'name'        => 'Pasta integrale tonno e pomodorini',
                'description' => 'Cuoci 90g di pasta integrale al dente. In una padella scalda un filo d\'olio extravergine, aggiungi 1 spicchio d\'aglio e 150g di pomodorini tagliati a metà. Dopo 3 minuti unisci 120g di tonno al naturale sgocciolato. Scola la pasta, saltala con il condimento e completa con prezzemolo fresco e origano. Veloce e nutriente.',
                'kcal'        => 440,
                'pro'         => 32,
                'carb'        => 58,
                'fat'         => 9,
                'image'       => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38',
                'prep_time'   => 20,
            ],
            [
                'name'        => 'Zuppa di lenticchie e spinaci',
                'description' => 'Soffriggi cipolla e sedano in olio extravergine. Aggiungi 200g di lenticchie rosse sciacquate, 600ml di brodo vegetale e un cucchiaino di curcuma. Cuoci 20 minuti. Negli ultimi 5 minuti aggiungi 100g di spinaci freschi e fai appassire. Regola di sale, pepe e un filo di limone a crudo. Ricca di fibre, ferro e proteine vegetali.',
                'kcal'        => 310,
                'pro'         => 18,
                'carb'        => 46,
                'fat'         => 6,
                'image'       => 'https://images.unsplash.com/photo-1547592180-85f173990554',
                'prep_time'   => 30,
            ],
            [
                'name'        => 'Petto di pollo alla griglia con broccoli',
                'description' => 'Marina 200g di petto di pollo con limone, aglio, paprika e origano per almeno 10 minuti. Grigliа su piastra calda 6-7 minuti per lato. Nel frattempo lessa 200g di cimette di broccoli al dente e saltale in padella con aglio e un filo d\'olio. Servi il pollo a fette con i broccoli al fianco. Ricetta classica ad alto contenuto proteico e basso in grassi.',
                'kcal'        => 350,
                'pro'         => 45,
                'carb'        => 20,
                'fat'         => 10,
                'image'       => 'https://images.unsplash.com/photo-1532550907401-a500c9a57435',
                'prep_time'   => 20,
            ],
            [
                'name'        => 'Burger di ceci con insalata mista',
                'description' => 'Scola e asciuga 400g di ceci in scatola, frullali grossolanamente con cipollotto, prezzemolo, cumino e 2 cucchiai di farina integrale. Forma 4 burger e cuoci in padella con poco olio 4 minuti per lato. Servi su letto di insalata mista con pomodorini, cetriolo e una salsa di yogurt greco con menta e limone. Ottima opzione vegetariana proteica.',
                'kcal'        => 390,
                'pro'         => 16,
                'carb'        => 52,
                'fat'         => 13,
                'image'       => 'https://images.unsplash.com/photo-1550317138-10000687a72b',
                'prep_time'   => 25,
            ],
            [
                'name'        => 'Bowl di riso integrale con salmone e avocado',
                'description' => 'Cuoci 80g di riso integrale. Disponi in una bowl il riso, 150g di salmone fresco cotto al vapore o abbattuto per sushi, mezzo avocado a fette, cetriolo e edamame. Condisci con salsa di soia light, sesamo tostato e un filo di olio di sesamo. Ricca di omega-3, grassi buoni e carboidrati a basso indice glicemico.',
                'kcal'        => 520,
                'pro'         => 36,
                'carb'        => 52,
                'fat'         => 19,
                'image'       => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c',
                'prep_time'   => 30,
            ],
            [
                'name'        => 'Frittata di albumi con zucchine e erbe',
                'description' => 'Sbatti 6 albumi con un pizzico di sale, pepe e erbe aromatiche miste (basilico, timo, prezzemolo). Soffriggi 1 zucchina a rondelle in padella antiaderente con poco olio extravergine. Versa gli albumi sulle zucchine e cuoci a fuoco medio con coperchio per 5 minuti, poi gira la frittata e cuoci altri 3 minuti. Leggera, proteica e senza tuorli.',
                'kcal'        => 240,
                'pro'         => 30,
                'carb'        => 8,
                'fat'         => 10,
                'image'       => 'https://images.unsplash.com/photo-1510693206972-df098062cb71',
                'prep_time'   => 15,
            ],
            [
                'name'        => 'Tacchino al forno con patate dolci',
                'description' => 'Taglia 200g di fesa di tacchino a bocconcini e marinala con senape, aglio, rosmarino e limone. Taglia 200g di patate dolci a cubetti, condiscile con olio e paprica. Disponi tutto in teglia e cuoci in forno a 200°C per 30-35 minuti, girando a metà cottura. La combinazione di proteine magre e carboidrati complessi è ideale per il recupero post-allenamento.',
                'kcal'        => 420,
                'pro'         => 40,
                'carb'        => 42,
                'fat'         => 10,
                'image'       => 'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d',
                'prep_time'   => 35,
            ],
            [
                'name'        => 'Insalata di farro con verdure grigliate',
                'description' => 'Cuoci 100g di farro perlato in acqua salata per 25 minuti e lascia raffreddare. Griglια su bistecchiera peperoni, zucchine e melanzane tagliate a strisce fino a doratura. Unisci le verdure al farro, aggiungi 80g di feta sbriciolata, foglie di menta fresca e condisci con olio extravergine, limone e origano. Gustosa, ricca di fibre e perfetta anche fredda.',
                'kcal'        => 360,
                'pro'         => 14,
                'carb'        => 54,
                'fat'         => 10,
                'image'       => 'https://images.unsplash.com/photo-1512058564366-18510be2db19',
                'prep_time'   => 25,
            ],
        ];

        foreach ($recipes as $recipe) {
            Recipe::create($recipe);
        }
    }
}

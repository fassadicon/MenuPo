<?php

namespace Database\Seeders;

use App\Models\Philfct;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PhilFCTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Philfct
        $philfcts = [
            [
                'id' => 1, // R014
                'philfct_id' => 'R014',
                'name' => 'Spaghetti',
                'kcal' => 83,
                'totFat' => 1,
                'satFat' => 0.35,
                'sugar' => 2.9,
                'sodium' => 277
            ],
            [
                'id' => 2, // Rice
                'philfct_id' => null,
                'name' => 'Rice',
                'kcal' => 129,
                'totFat' => 0.2,
                'satFat' => 0.05,
                'sugar' => 0.1,
                'sodium' => 3
            ],
            [
                'id' => 3, 
                'philfct_id' => null,
                'name' => 'Fried Chicken',
                'kcal' => 226,
                'totFat' => 17,
                'satFat' => 6.21,
                'sugar' => 2.9,
                'sodium' => 698
            ],
            [
                'id' => 4, 
                'philfct_id' => null,
                'name' => 'Pork Siomai',
                'kcal' => 298,
                'totFat' => 16.7,
                'satFat' => 4.9,
                'sugar' => 1.2,
                'sodium' => 291
            ],
            [
                'id' => 5, 
                'philfct_id' => null,
                'name' => 'Pork Siopao',
                'kcal' => 294,
                'totFat' => 11.2,
                'satFat' => 4.75,
                'sugar' => 0,
                'sodium' => 0
            ],
            [
                'id' => 6, 
                'philfct_id' => null,
                'name' => 'Tocino',
                'kcal' => 206,
                'totFat' => 6.4,
                'satFat' => 2.2,
                'sugar' => 20.2,
                'sodium' => 1037
            ],
            [
                'id' => 7, 
                'philfct_id' => null,
                'name' => 'Sweet Ham',
                'kcal' => 117,
                'totFat' => 4.4,
                'satFat' => 1.34,
                'sugar' => 2.9,
                'sodium' => 1208
            ],
            [
                'id' => 8, 
                'philfct_id' => null,
                'name' => 'Boiled Chicken Egg',
                'kcal' => 166,
                'totFat' => 12,
                'satFat' => 3.58,
                'sugar' => 0.4,
                'sodium' => 136
            ],
            [
                'id' => 9, 
                'philfct_id' => null,
                'name' => 'Turon',
                'kcal' => 259,
                'totFat' => 6.4,
                'satFat' => 5.41,
                'sugar' => 28.8,
                'sodium' => 89
            ],
            [
                'id' => 10, 
                'philfct_id' => null,
                'name' => 'Zesto Grape Flavor',
                'kcal' => 90,
                'totFat' => 0.2,
                'satFat' => 0,
                'sugar' => 21.6,
                'sodium' => 14
            ],
            [
                'id' => 11, 
                'philfct_id' => null,
                'name' => 'Zesto Guava Flavor',
                'kcal' => 92,
                'totFat' => 0.6,
                'satFat' => 0.3,
                'sugar' => 17.6,
                'sodium' => 14
            ],
            [
                'id' => 12, 
                'philfct_id' => null,
                'name' => 'Zesto Strawberry Flavor',
                'kcal' => 100,
                'totFat' => 0.4,
                'satFat' => 0,
                'sugar' => 23.2,
                'sodium' => 10
            ],
            [
                'id' => 13, 
                'philfct_id' => null,
                'name' => 'Buko Juice',
                'kcal' => 78,
                'totFat' => 0.4,
                'satFat' => 0.34,
                'sugar' => 10.2,
                'sodium' => 14
            ],
            [
                'id' => 14, 
                'philfct_id' => null,
                'name' => 'Coco honet biscuit',
                'kcal' => 63.42,
                'totFat' => 1.554,
                'satFat' => 2.856,
                'sugar' => 4.2,
                'sodium' => 1.12
            ],
            [
                'id' => 15, 
                'philfct_id' => null,
                'name' => 'Curly tops',
                'kcal' => 25.9,
                'totFat' => 0.8235,
                'satFat' => 2.58,
                'sugar' => 0.5,
                'sodium' => 0.5
            ],
            [
                'id' => 16, 
                'philfct_id' => null,
                'name' => 'Peanut Brittle',
                'kcal' => 118.32,
                'totFat' => 5.808,
                'satFat' => 1.2672,
                'sugar' => 11.76,
                'sodium' => 101.76
            ],
            [
                'id' => 17, 
                'philfct_id' => null,
                'name' => 'Chopsuey',
                'kcal' => 70,
                'totFat' => 2.8,
                'satFat' => 1.3,
                'sugar' => 4,
                'sodium' => 354
            ],
        ];
        Philfct::insert($philfcts);
    }
}

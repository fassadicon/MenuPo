<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Food;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class FoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                // Food
                $foods = [
                    [
                        'name' => 'Rice',
                        'description' => 'One cup rice/kanin',
                        'type' => 0,
                        'price' => 15,
                        'servingSize' => 100,
                        'philfct_id' => 2,
                        'created_by' => 2,
                        'stock' => 40,
                        'calcKcal' => 129,
                        'calcTotFat' => 0.2,
                        'calcSatFat' => 0.05,
                        'calcSugar' => 0.1,
                        'calcSodium' => 3,
                    ],
                    [
                        'philfct_id' => null,
                        'name' => 'Fried Chicken',
                        'calcKcal' => 226,
                        'calcTotFat' => 17,
                        'calcSatFat' => 6.21,
                        'calcSugar' => 2.9,
                        'calcSodium' => 698,
                        'description' => '1 pc fried chicken with 1 cup rice',
                        'type' => 3,
                        'price' => 40,
                        'servingSize' => 100,
                        'philfct_id' => 3,
                        'created_by' => 2,
                    ],
                    [
                        'philfct_id' => null,
                        'name' => 'Pork Siomai',
                        'calcKcal' => 298,
                        'calcTotFat' => 16.7,
                        'calcSatFat' => 4.9,
                        'calcSugar' => 1.2,
                        'calcSodium' => 291,
                        'description' => 'Pork Siomai with Toyo and Calamansi',
                        'type' => 0,
                        'price' => 25,
                        'servingSize' => 100,
                        'philfct_id' => 4,
                        'created_by' => 2,
                        'stock' => 40,
                    ],
                    [
                        'philfct_id' => null,
                        'name' => 'Pork Siopao',
                        'calcKcal' => 294,
                        'calcTotFat' => 11.2,
                        'calcSatFat' => 4.75,
                        'calcSugar' => 0,
                        'calcSodium' => 0,
                        'description' => 'one serving of pork siopao',
                        'type' => 0,
                        'price' => 15,
                        'servingSize' => 100,
                        'philfct_id' => 5,
                        'created_by' => 2,
                        'stock' => 40
                    ],
                    [
                        'philfct_id' => null,
                        'name' => 'Tocino',
                        'calcKcal' => 206,
                        'calcTotFat' => 6.4,
                        'calcSatFat' => 2.2,
                        'calcSugar' => 20.2,
                        'calcSodium' => 1037,
                        'description' => 'Pork Tocino with Rice',
                        'type' => 3,
                        'price' => 40,
                        'servingSize' => 100,
                        'philfct_id' => 6,
                        'created_by' => 2,
                        'stock' => 40
                    ],
                    [
                        'id' => 7, 
                        'philfct_id' => null,
                        'name' => 'Sweet Ham',
                        'calcKcal' => 117,
                        'calcTotFat' => 4.4,
                        'calcSatFat' => 1.34,
                        'calcSugar' => 2.9,
                        'calcSodium' => 1208,
                        'description' => 'serving of sweet pork ham with rice',
                        'type' => 0,
                        'price' => 15,
                        'servingSize' => 100,
                        'philfct_id' => 7,
                        'created_by' => 2,
                        'stock' => 40
                    ],
                    [
                        'id' => 8, 
                        'philfct_id' => null,
                        'name' => 'Boiled Chicken Egg',
                        'calcKcal' => 166,
                        'calcTotFat' => 12,
                        'calcSatFat' => 3.58,
                        'calcSugar' => 0.4,
                        'calcSodium' => 136,
                        'description' => '1 pc boiled chicken egg',
                        'type' => 0,
                        'price' => 15,
                        'servingSize' => 100,
                        'philfct_id' => 8,
                        'created_by' => 2,
                        'stock' => 40
                    ],
                    [
                        'id' => 9, 
                        'philfct_id' => null,
                        'name' => 'Turon',
                        'calcKcal' => 259,
                        'calcTotFat' => 6.4,
                        'calcSatFat' => 5.41,
                        'calcSugar' => 28.8,
                        'calcSodium' => 89,
                        'description' => '1 pc banana turon',
                        'type' => 0,
                        'price' => 15,
                        'servingSize' => 100,
                        'philfct_id' => 9,
                        'created_by' => 2,
                        'stock' => 40
                    ],
                    [
                        'id' => 10, 
                        'philfct_id' => null,
                        'name' => 'Zesto Grape Flavor',
                        'calcKcal' => 90,
                        'calcTotFat' => 0.2,
                        'calcSatFat' => 0,
                        'calcSugar' => 21.6,
                        'calcSodium' => 14,
                        'description' => 'Zesto Fruit juice drink, grape flavor',
                        'type' => 1,
                        'price' => 10,
                        'servingSize' => 200,
                        'philfct_id' => 9,
                        'created_by' => 2,
                        'stock' => 40
                        
                    ],
                    [
                        'id' => 11, 
                        'philfct_id' => null,
                        'name' => 'Zesto Guava Flavor',
                        'calcKcal' => 92,
                        'calcTotFat' => 0.6,
                        'calcSatFat' => 0.3,
                        'calcSugar' => 17.6,
                        'calcSodium' => 14,
                        'description' => 'Zesto Fruit juice drink, guava flavor',
                        'type' => 1,
                        'price' => 10,
                        'servingSize' => 200,
                        'philfct_id' => 9,
                        'created_by' => 2,
                        'stock' => 40
                    ],
                    [
                        'id' => 12, 
                        'philfct_id' => null,
                        'name' => 'Zesto Strawberry Flavor',
                        'calcKcal' => 100,
                        'calcTotFat' => 0.4,
                        'calcSatFat' => 0,
                        'calcSugar' => 23.2,
                        'calcSodium' => 10,
                        'description' => 'Zesto Fruit juice drink, strawberry flavor',
                        'type' => 1,
                        'price' => 10,
                        'servingSize' => 200,
                        'philfct_id' => 9,
                        'created_by' => 2,
                        'stock' => 40
                    ],
                    [
                        'id' => 13, 
                        'philfct_id' => null,
                        'name' => 'Buko Juice',
                        'calcKcal' => 78,
                        'calcTotFat' => 0.4,
                        'calcSatFat' => 0.34,
                        'calcSugar' => 10.2,
                        'calcSodium' => 14,
                        'description' => 'Buko juice palamig',
                        'type' => 1,
                        'price' => 10,
                        'servingSize' => 200,
                        'philfct_id' => 9,
                        'created_by' => 2,
                        'stock' => 40
                    ],
                    [
                        'id' => 14, 
                        'philfct_id' => null,
                        'name' => 'Coco honet biscuit',
                        'calcKcal' => 63.42,
                        'calcTotFat' => 1.554,
                        'calcSatFat' => 2.856,
                        'calcSugar' => 4.2,
                        'calcSodium' => 1.12,
                        'description' => 'cocohoney biscuit',
                        'type' => 2,
                        'price' => 10,
                        'servingSize' => 14,
                        'philfct_id' => 9,
                        'created_by' => 2,
                        'stock' => 40
                    ],
                    [
                        'id' => 15, 
                        'philfct_id' => null,
                        'name' => 'Curly tops',
                        'calcKcal' => 25.9,
                        'calcTotFat' => 0.8235,
                        'calcSatFat' => 2.58,
                        'calcSugar' => 0.5,
                        'calcSodium' => 0.5,
                        'description' => 'curly tops milk chocolate candy',
                        'type' => 2,
                        'price' => 3,
                        'servingSize' => 5,
                        'philfct_id' => 9,
                        'created_by' => 2,
                        'stock' => 40
                    ],
                    [
                        'id' => 16, 
                        'philfct_id' => null,
                        'name' => 'Peanut Brittle',
                        'calcKcal' => 118.32,
                        'calcTotFat' => 5.808,
                        'calcSatFat' => 1.2672,
                        'calcSugar' => 11.76,
                        'calcSodium' => 101.76,
                        'description' => 'peanut brittle candy snack',
                        'type' => 2,
                        'price' => 20,
                        'servingSize' => 20,
                        'philfct_id' => 9,
                        'created_by' => 2,
                        'stock' => 40
                    ],
                    [
                        'id' => 17, 
                        'philfct_id' => null,
                        'name' => 'Chopsuey',
                        'calcKcal' => 70,
                        'calcTotFat' => 2.8,
                        'calcSatFat' => 1.3,
                        'calcSugar' => 4,
                        'calcSodium' => 354,
                        'description' => 'serving of chopsuey vegetable stew',
                        'type' => 3,
                        'price' => 25,
                        'servingSize' => 100,
                        'philfct_id' => 9,
                        'created_by' => 2,
                        'stock' => 40
                        
                    ]
                ];
                Food::insert($foods);
    }
}

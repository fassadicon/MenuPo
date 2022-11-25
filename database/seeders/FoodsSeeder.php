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
                    // [
                    //     'name' => 'Rice',
                    //     'description' => 'One cup rice/kanin',
                    //     'type' => 0,
                    //     'price' => 15,
                    //     'servingSize' => 100,
                    //     'philfct_id' => 2,
                    //     'created_by' => 2,
                    //     'stock' => 40,
                    //     'calcKcal' => 129,
                    //     'calcTotFat' => 0.2,
                    //     'calcSatFat' => 0.05,
                    //     'calcSugar' => 0.1,
                    //     'calcSodium' => 3,
                    // ],
                    // [
                    //     
                    //     'name' => 'Fried Chicken',
                    //     'calcKcal' => 226,
                    //     'calcTotFat' => 17,
                    //     'calcSatFat' => 6.21,
                    //     'calcSugar' => 2.9,
                    //     'calcSodium' => 698,
                    //     'description' => '1 pc fried chicken with 1 cup rice',
                    //     'type' => 3,
                    //     'price' => 40,
                    //     'servingSize' => 100,
                    //     'philfct_id' => 3,
                    //     'created_by' => 2,
                    // ],
                    // [
                    //     
                    //     'name' => 'Pork Siomai',
                    //     'calcKcal' => 298,
                    //     'calcTotFat' => 16.7,
                    //     'calcSatFat' => 4.9,
                    //     'calcSugar' => 1.2,
                    //     'calcSodium' => 291,
                    //     'description' => 'Pork Siomai with Toyo and Calamansi',
                    //     'type' => 0,
                    //     'price' => 25,
                    //     'servingSize' => 100,
                    //     'philfct_id' => 4,
                    //     'created_by' => 2,
                    //     'stock' => 40,
                    // ],
                    // [
                    //     
                    //     'name' => 'Pork Siopao',
                    //     'calcKcal' => 294,
                    //     'calcTotFat' => 11.2,
                    //     'calcSatFat' => 4.75,
                    //     'calcSugar' => 0,
                    //     'calcSodium' => 0,
                    //     'description' => 'one serving of pork siopao',
                    //     'type' => 0,
                    //     'price' => 15,
                    //     'servingSize' => 100,
                    //     'philfct_id' => 5,
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     
                    //     'name' => 'Tocino',
                    //     'calcKcal' => 206,
                    //     'calcTotFat' => 6.4,
                    //     'calcSatFat' => 2.2,
                    //     'calcSugar' => 20.2,
                    //     'calcSodium' => 1037,
                    //     'description' => 'Pork Tocino with Rice',
                    //     'type' => 3,
                    //     'price' => 40,
                    //     'servingSize' => 100,
                    //     'philfct_id' => 6,
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 7, 
                    //     
                    //     'name' => 'Sweet Ham',
                    //     'calcKcal' => 117,
                    //     'calcTotFat' => 4.4,
                    //     'calcSatFat' => 1.34,
                    //     'calcSugar' => 2.9,
                    //     'calcSodium' => 1208,
                    //     'description' => 'serving of sweet pork ham with rice',
                    //     'type' => 0,
                    //     'price' => 15,
                    //     'servingSize' => 100,
                    //     'philfct_id' => 7,
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 8, 
                    //     
                    //     'name' => 'Boiled Chicken Egg',
                    //     'calcKcal' => 166,
                    //     'calcTotFat' => 12,
                    //     'calcSatFat' => 3.58,
                    //     'calcSugar' => 0.4,
                    //     'calcSodium' => 136,
                    //     'description' => '1 pc boiled chicken egg',
                    //     'type' => 0,
                    //     'price' => 15,
                    //     'servingSize' => 100,
                    //     'philfct_id' => 8,
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 9, 
                    //     
                    //     'name' => 'Turon',
                    //     'calcKcal' => 259,
                    //     'calcTotFat' => 6.4,
                    //     'calcSatFat' => 5.41,
                    //     'calcSugar' => 28.8,
                    //     'calcSodium' => 89,
                    //     'description' => '1 pc banana turon',
                    //     'type' => 0,
                    //     'price' => 15,
                    //     'servingSize' => 100,
                    //     
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 10, 
                    //     
                    //     'name' => 'Zesto Grape Flavor',
                    //     'calcKcal' => 90,
                    //     'calcTotFat' => 0.2,
                    //     'calcSatFat' => 0,
                    //     'calcSugar' => 21.6,
                    //     'calcSodium' => 14,
                    //     'description' => 'Zesto Fruit juice drink, grape flavor',
                    //     'type' => 1,
                    //     'price' => 10,
                    //     'servingSize' => 200,
                    //     
                    //     'created_by' => 2,
                    //     'stock' => 40
                        
                    // ],
                    // [
                    //     'id' => 11, 
                    //     
                    //     'name' => 'Zesto Guava Flavor',
                    //     'calcKcal' => 92,
                    //     'calcTotFat' => 0.6,
                    //     'calcSatFat' => 0.3,
                    //     'calcSugar' => 17.6,
                    //     'calcSodium' => 14,
                    //     'description' => 'Zesto Fruit juice drink, guava flavor',
                    //     'type' => 1,
                    //     'price' => 10,
                    //     'servingSize' => 200,
                    //     
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 12, 
                    //     
                    //     'name' => 'Zesto Strawberry Flavor',
                    //     'calcKcal' => 100,
                    //     'calcTotFat' => 0.4,
                    //     'calcSatFat' => 0,
                    //     'calcSugar' => 23.2,
                    //     'calcSodium' => 10,
                    //     'description' => 'Zesto Fruit juice drink, strawberry flavor',
                    //     'type' => 1,
                    //     'price' => 10,
                    //     'servingSize' => 200,
                    //     
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 13, 
                    //     
                    //     'name' => 'Buko Juice',
                    //     'calcKcal' => 78,
                    //     'calcTotFat' => 0.4,
                    //     'calcSatFat' => 0.34,
                    //     'calcSugar' => 10.2,
                    //     'calcSodium' => 14,
                    //     'description' => 'Buko juice palamig',
                    //     'type' => 1,
                    //     'price' => 10,
                    //     'servingSize' => 200,
                    //     
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 14, 
                    //     
                    //     'name' => 'Coco honet biscuit',
                    //     'calcKcal' => 63.42,
                    //     'calcTotFat' => 1.554,
                    //     'calcSatFat' => 2.856,
                    //     'calcSugar' => 4.2,
                    //     'calcSodium' => 1.12,
                    //     'description' => 'cocohoney biscuit',
                    //     'type' => 2,
                    //     'price' => 10,
                    //     'servingSize' => 14,
                    //     
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 15, 
                    //     
                    //     'name' => 'Curly tops',
                    //     'calcKcal' => 25.9,
                    //     'calcTotFat' => 0.8235,
                    //     'calcSatFat' => 2.58,
                    //     'calcSugar' => 0.5,
                    //     'calcSodium' => 0.5,
                    //     'description' => 'curly tops milk chocolate candy',
                    //     'type' => 2,
                    //     'price' => 3,
                    //     'servingSize' => 5,
                    //     
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 16, 
                    //     
                    //     'name' => 'Peanut Brittle',
                    //     'calcKcal' => 118.32,
                    //     'calcTotFat' => 5.808,
                    //     'calcSatFat' => 1.2672,
                    //     'calcSugar' => 11.76,
                    //     'calcSodium' => 101.76,
                    //     'description' => 'peanut brittle candy snack',
                    //     'type' => 2,
                    //     'price' => 20,
                    //     'servingSize' => 20,
                    //     
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 17, 
                    //     
                    //     'name' => 'Chopsuey',
                    //     'calcKcal' => 70,
                    //     'calcTotFat' => 2.8,
                    //     'calcSatFat' => 1.3,
                    //     'calcSugar' => 4,
                    //     'calcSodium' => 354,
                    //     'description' => 'serving of chopsuey vegetable stew',
                    //     'type' => 3,
                    //     'price' => 25,
                    //     'servingSize' => 100,
                    //     
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 18, 
                        
                    //     'name' => 'Pork BBQ',
                    //     'calcKcal' => 408,
                    //     'calcTotFat' => 29,
                    //     'calcSatFat' => 10.25,
                    //     'calcSugar' => 0,
                    //     'calcSodium' => 340,
                    //     'description' => 'pork barbecque/inihaw w/ rice',
                    //     'type' => 3,
                    //     'price' => 40,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 19, 
                        
                    //     'name' => 'Kikyam',
                    //     'calcKcal' => 129,
                    //     'calcTotFat' => 2.1,
                    //     'calcSatFat' => 0,
                    //     'calcSugar' => 0,
                    //     'calcSodium' => 0,
                    //     'description' => 'Kikyam/Tusok-tusok',
                    //     'type' => 2,
                    //     'price' => 5,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 20, 
                        
                    //     'name' => 'Pritong Bangus',
                    //     'calcKcal' => 188,
                    //     'calcTotFat' => 10.4,
                    //     'calcSatFat' => 0,
                    //     'calcSugar' => 0,
                    //     'calcSodium' => 106,
                    //     'description' => 'Fried Bangus w/ rice',
                    //     'type' => 3,
                    //     'price' => 50,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 21, 
                        
                    //     'name' => 'Inihaw na bangus',
                    //     'calcKcal' => 137,
                    //     'calcTotFat' => 4.8,
                    //     'calcSatFat' => 0,
                    //     'calcSugar' => 0,
                    //     'calcSodium' => 82,
                    //     'description' => 'Bangus/Broiled',
                    //     'type' => 3,
                    //     'price' => 60,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 22, 
                        
                    //     'name' => 'Lechong Manok',
                    //     'calcKcal' => 226,
                    //     'calcTotFat' => 12,
                    //     'calcSatFat' => 4.07,
                    //     'calcSugar' => 1.5,
                    //     'calcSodium' => 716,
                    //     'description' => 'Roasted Chicken w/ rice',
                    //     'type' => 3,
                    //     'price' => 50,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 23, 
                        
                    //     'name' => 'Embotido',
                    //     'calcKcal' => 164,
                    //     'calcTotFat' => 8.5,
                    //     'calcSatFat' => 3.4,
                    //     'calcSugar' => 5.1,
                    //     'calcSodium' => 939,
                    //     'description' => 'Embotido w/ rice',
                    //     'type' => 3,
                    //     'price' => 45,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 24, 
                        
                    //     'name' => 'Chicken Nuggets',
                    //     'calcKcal' => 220,
                    //     'calcTotFat' => 11.2,
                    //     'calcSatFat' => 2.22,
                    //     'calcSugar' => 0.7,
                    //     'calcSodium' => 520,
                    //     'description' => 'Chicken Nuggets',
                    //     'type' => 3,
                    //     'price' => 35,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 25, 
                        
                    //     'name' => 'Corned Beef',
                    //     'calcKcal' => 168,
                    //     'calcTotFat' => 10.7,
                    //     'calcSatFat' => 4.51,
                    //     'calcSugar' => 0,
                    //     'calcSodium' => 567,
                    //     'description' => 'Canned Corned Beef',
                    //     'type' => 3,
                    //     'price' => 35,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 26, 
                        
                    //     'name' => 'Chicharon',
                    //     'calcKcal' => 591,
                    //     'calcTotFat' => 36.5,
                    //     'calcSatFat' => 7.25,
                    //     'calcSugar' => 0,
                    //     'calcSodium' => 472,
                    //     'description' => 'Canned Corned Beef',
                    //     'type' => 2,
                    //     'price' => 30,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 27, 
                        
                    //     'name' => 'Lechon Kawali',
                    //     'calcKcal' => 245,
                    //     'calcTotFat' => 21.8,
                    //     'calcSatFat' => 7.95,
                    //     'calcSugar' => 0,
                    //     'calcSodium' => 61,
                    //     'description' => 'Pork Belly Fried w/ rice',
                    //     'type' => 3,
                    //     'price' => 60,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 28, 
                        
                    //     'name' => 'Polvoron',
                    //     'calcKcal' => 469,
                    //     'calcTotFat' => 16.4,
                    //     'calcSatFat' => 10.17,
                    //     'calcSugar' => 46.2,
                    //     'calcSodium' => 194,
                    //     'description' => 'Polvoron',
                    //     'type' => 2,
                    //     'price' => 8,
                    //     'servingSize' => 27,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 29, 
                        
                    //     'name' => 'Pork Siopao',
                    //     'calcKcal' => 294,
                    //     'calcTotFat' => 11.2,
                    //     'calcSatFat' => 4.75,
                    //     'calcSugar' => 0,
                    //     'calcSodium' => 0,
                    //     'description' => 'Pork Siopao Asado',
                    //     'type' => 2,
                    //     'price' => 35,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 30, 
                        
                    //     'name' => 'Champorado',
                    //     'calcKcal' => 97,
                    //     'calcTotFat' => 0.2,
                    //     'calcSatFat' => 0.11,
                    //     'calcSugar' => 4.8,
                    //     'calcSodium' => 13,
                    //     'description' => 'Champorado w/ milk',
                    //     'type' => 3,
                    //     'price' => 20,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 31, 
                        
                    //     'name' => 'Yakult',
                    //     'calcKcal' => 71,
                    //     'calcTotFat' => 0.2,
                    //     'calcSatFat' => 0.13,
                    //     'calcSugar' => 6,
                    //     'calcSodium' => 61,
                    //     'description' => 'Cultured milk drink',
                    //     'type' => 1,
                    //     'price' => 12,
                    //     'servingSize' => 80,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 32, 
                        
                    //     'name' => 'Pritong Baka',
                    //     'calcKcal' => 152,
                    //     'calcTotFat' => 6.4,
                    //     'calcSatFat' => 2.49,
                    //     'calcSugar' => 0,
                    //     'calcSodium' => 44,
                    //     'description' => 'Pritong Baka w/ rice',
                    //     'type' => 3,
                    //     'price' => 40,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 33, 
                        
                    //     'name' => 'Pritong Liempo',
                    //     'calcKcal' => 245,
                    //     'calcTotFat' => 21.8,
                    //     'calcSatFat' => 7.95,
                    //     'calcSugar' => 0,
                    //     'calcSodium' => 61,
                    //     'description' => 'Pritong Liempo w/ rice',
                    //     'type' => 3,
                    //     'price' => 40,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 34, 
                        
                    //     'name' => 'Banana Cue',
                    //     'calcKcal' => 183,
                    //     'calcTotFat' => 2.6,
                    //     'calcSatFat' => 2.21,
                    //     'calcSugar' => 36.2,
                    //     'calcSodium' => 6,
                    //     'description' => 'Fried banana coated with caramelized sugar',
                    //     'type' => 2,
                    //     'price' => 15,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 35, 
                        
                    //     'name' => 'Maruya',
                    //     'calcKcal' => 240,
                    //     'calcTotFat' => 3.9,
                    //     'calcSatFat' => 3.3,
                    //     'calcSugar' => 25,
                    //     'calcSodium' => 190,
                    //     'description' => 'Banana Fritter',
                    //     'type' => 2,
                    //     'price' => 15,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 36, 
                        
                    //     'name' => 'Banana Latundan',
                    //     'calcKcal' => 105,
                    //     'calcTotFat' => 0.3,
                    //     'calcSatFat' => 0.1,
                    //     'calcSugar' => 13,
                    //     'calcSodium' => 3,
                    //     'description' => 'Banana Latundan',
                    //     'type' => 2,
                    //     'price' => 5,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 37, 
                        
                    //     'name' => 'Banana Lakatan',
                    //     'calcKcal' => 126,
                    //     'calcTotFat' => 0.2,
                    //     'calcSatFat' => 0.07,
                    //     'calcSugar' => 15.6,
                    //     'calcSodium' => 2,
                    //     'description' => 'Banana Lakatan',
                    //     'type' => 2,
                    //     'price' => 5,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 38, 
                        
                    //     'name' => 'Red Apple',
                    //     'calcKcal' => 67,
                    //     'calcTotFat' => 0.1,
                    //     'calcSatFat' => 0.02,
                    //     'calcSugar' => 12,
                    //     'calcSodium' => 2,
                    //     'description' => 'Red Apple',
                    //     'type' => 2,
                    //     'price' => 25,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 39, 
                        
                    //     'name' => 'Chips cheese flavor',
                    //     'calcKcal' => 489,
                    //     'calcTotFat' => 24.1,
                    //     'calcSatFat' => 12.66,
                    //     'calcSugar' => 2.5,
                    //     'calcSodium' => 672,
                    //     'description' => 'Tortillos',
                    //     'type' => 2,
                    //     'price' => 15,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 40, 
                        
                    //     'name' => 'Corn chips BBQ Flavor',
                    //     'calcKcal' => 535,
                    //     'calcTotFat' => 30.7,
                    //     'calcSatFat' => 16.13,
                    //     'calcSugar' => 0.3,
                    //     'calcSodium' => 758,
                    //     'description' => 'Nachos, Leslies, Doritos',
                    //     'type' => 2,
                    //     'price' => 15,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 41, 
                        
                    //     'name' => 'Corn chips Nachos Flavor',
                    //     'calcKcal' => 528,
                    //     'calcTotFat' => 30,
                    //     'calcSatFat' => 15.76,
                    //     'calcSugar' => 0.3,
                    //     'calcSodium' => 682,
                    //     'description' => 'Tostillas',
                    //     'type' => 2,
                    //     'price' => 15,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 42, 
                        
                    //     'name' => 'Corn chips Natural Flavor',
                    //     'calcKcal' => 527,
                    //     'calcTotFat' => 29.1,
                    //     'calcSatFat' => 15.29,
                    //     'calcSugar' => 0.3,
                    //     'calcSodium' => 514,
                    //     'description' => 'Nachos, Lesliesm Doritos',
                    //     'type' => 2,
                    //     'price' => 15,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 43, 
                        
                    //     'name' => 'Potato Chips cheese flavor',
                    //     'calcKcal' => 540,
                    //     'calcTotFat' => 33.4,
                    //     'calcSatFat' => 17.54,
                    //     'calcSugar' => 0.3,
                    //     'calcSodium' => 453,
                    //     'description' => 'Oishi Potato Cheese Flavor',
                    //     'type' => 2,
                    //     'price' => 15,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 44, 
                        
                    //     'name' => 'Fishda Kroepeck',
                    //     'calcKcal' => 502,
                    //     'calcTotFat' => 27,
                    //     'calcSatFat' => 20.26,
                    //     'calcSugar' => 0.2,
                    //     'calcSodium' => 729,
                    //     'description' => 'Fishda',
                    //     'type' => 2,
                    //     'price' => 15,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 45, 
                        
                    //     'name' => 'Oishi prawn crackers',
                    //     'calcKcal' => 502,
                    //     'calcTotFat' => 27,
                    //     'calcSatFat' => 20.26,
                    //     'calcSugar' => 0.2,
                    //     'calcSodium' => 729,
                    //     'description' => 'Oishiiii',
                    //     'type' => 2,
                    //     'price' => 15,
                    //     'servingSize' => 100,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 46, 
                        
                    //     'name' => 'Del monte apple flavor',
                    //     'calcKcal' => 100,
                    //     'calcTotFat' => 0.4,
                    //     'calcSatFat' => 0.06,
                    //     'calcSugar' => 20.2,
                    //     'calcSodium' => 8,
                    //     'description' => 'Apple Drink',
                    //     'type' => 1,
                    //     'price' => 20,
                    //     'servingSize' => 200,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 47, 
                        
                    //     'name' => 'Zesto Mango Flavor',
                    //     'calcKcal' => 114,
                    //     'calcTotFat' => 0.4,
                    //     'calcSatFat' => 0.1,
                    //     'calcSugar' => 26.4,
                    //     'calcSodium' => 20,
                    //     'description' => 'Mango Drink',
                    //     'type' => 1,
                    //     'price' => 12,
                    //     'servingSize' => 200,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 47, 
                        
                    //     'name' => 'Del Monte Orange and Pineapple Flavor',
                    //     'calcKcal' => 94,
                    //     'calcTotFat' => 0.4,
                    //     'calcSatFat' => 0.06,
                    //     'calcSugar' => 20.4,
                    //     'calcSodium' => 6,
                    //     'description' => 'Orange and Pineapple Drink',
                    //     'type' => 1,
                    //     'price' => 20,
                    //     'servingSize' => 200,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 48, 
                        
                    //     'name' => 'Zesto Orange Flavor',
                    //     'calcKcal' => 86,
                    //     'calcTotFat' => 0.4,
                    //     'calcSatFat' => 0.04,
                    //     'calcSugar' => 14.4,
                    //     'calcSodium' => 4,
                    //     'description' => 'Orange Drink',
                    //     'type' => 1,
                    //     'price' => 12,
                    //     'servingSize' => 200,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 49, 
                        
                    //     'name' => 'Cola Softdrinks',
                    //     'calcKcal' => 82,
                    //     'calcTotFat' => 0.2,
                    //     'calcSatFat' => 0,
                    //     'calcSugar' => 18.8,
                    //     'calcSodium' => 8,
                    //     'description' => 'Cola Softdrinks',
                    //     'type' => 1,
                    //     'price' => 20,
                    //     'servingSize' => 200,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 50, 
                        
                    //     'name' => 'Royal Orange Softdrinks',
                    //     'calcKcal' => 92,
                    //     'calcTotFat' => 0,
                    //     'calcSatFat' => 0,
                    //     'calcSugar' => 19.4,
                    //     'calcSodium' => 24,
                    //     'description' => 'Royal Orange Softdrinks',
                    //     'type' => 1,
                    //     'price' => 20,
                    //     'servingSize' => 200,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 51, 
                        
                    //     'name' => 'Soyabean Chocolate Drink',
                    //     'calcKcal' => 152,
                    //     'calcTotFat' => 0.6,
                    //     'calcSatFat' => 0.1,
                    //     'calcSugar' => 20.8,
                    //     'calcSodium' => 140,
                    //     'description' => 'Vitamilk, Vitasoy',
                    //     'type' => 1,
                    //     'price' => 25,
                    //     'servingSize' => 200,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ],
                    // [
                    //     'id' => 52, 
                        
                    //     'name' => 'Soyabean Drink',
                    //     'calcKcal' => 102,
                    //     'calcTotFat' => 0.16,
                    //     'calcSatFat' => 0.18,
                    //     'calcSugar' => 8,
                    //     'calcSodium' => 4,
                    //     'description' => 'Vitamilk, Vitasoy',
                    //     'type' => 1,
                    //     'price' => 25,
                    //     'servingSize' => 200,
                        
                    //     'created_by' => 2,
                    //     'stock' => 40
                    // ]

                ];
                Food::insert($foods);
    }
}

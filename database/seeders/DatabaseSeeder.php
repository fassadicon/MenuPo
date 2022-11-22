<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Food;
use App\Models\Menu;
use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Philfct;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Student;
use App\Models\Guardian;
use App\Models\Purchase;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // SuperAdmin
        DB::table('users')->delete();
        $superAdminUser = [
            [
                'id' => 1,
                'email' => 'super@admin.com',
                'recoveryEmail' => 'super@recover.com',
                'password' => bcrypt('qwe'),
                'role' => 2,
                'created_at' => '2022-05-01'
            ],
        ];
        DB::table('admins')->delete();
        $superAdmin = [
            [
                'id' => 1,
                'firstName' => 'NSDAPS',
                'lastName' => 'Admin',
                'birthDate' => '2022-05-01',
                'sex' => 'A',
                'status' => 1,
                'created_at' => '2022-05-01',
                'user_id' => 1,
                'created_by' => 1,
            ]
        ];
        User::insert($superAdminUser);
        Admin::insert($superAdmin);

        // Admin
        $adminUser = [
            [
                'id' => 2,
                'email' => 'test@admin.com',
                'recoveryEmail' => 'admin@recover.com',
                'password' => bcrypt('123'),
                'role' => 1,
                'created_at' => '2022-05-01'
            ],
            [
                'id' => 4,
                'email' => 'delcjoshua10@gmail.com',
                'recoveryEmail' => 'admin@recover.com',
                'password' => bcrypt('123'),
                'role' => 1,
                'created_at' => '2022-05-01',
            ],
            [
                'id' => 5,
                'email' => 'jportugaliza@gmail.com',
                'recoveryEmail' => 'admin@recover.com',
                'password' => bcrypt('123'),
                'role' => 1,
                'created_at' => '2022-05-01'
            ],
        ];
        $admin = [
            [
                'id' => 2,
                'firstName' => 'Glen',
                'lastName' => 'Reyes',
                'birthDate' => '2022-05-01',
                'status' => 1,
                'sex' => 'M',
                'created_at' => '2022-05-01',
                'created_by' => 1,
                'user_id' => 2,
                'image' => 'admin/admins/1.png'
            ],
            [
                'id' => 3,
                'firstName' => 'Joshua',
                'lastName' => 'Dela Cruz',
                'birthDate' => '2022-05-01',
                'status' => 1,
                'sex' => 'F',
                'created_at' => '2022-05-01',
                'created_by' => 2,
                'user_id' => 4,
                'image' => 'admin/admins/2.png'
            ],
            [
                'id' => 4,
                'firstName' => 'Lydia',
                'lastName' => 'Portugaliza',
                'birthDate' => '2022-05-01',
                'status' => 1,
                'sex' => 'M',
                'created_at' => '2022-05-01',
                'created_by' => 2,
                'user_id' => 5,
                'image' => 'admin/admins/3.png'
            ]
        ];
        User::insert($adminUser);
        Admin::insert($admin);

        // Parents
        DB::table('parents')->delete();
        $parentUser = [
            [
                'id' => 3,
                'email' => 'test@parent.com',
                'recoveryEmail' => 'parent@recover.com',
                'password' => bcrypt('zxc'),
                'role' => 0,
                'created_at' => '2022-06-01'
            ],
            [
                'id' => 6,
                'email' => 'byronjames@gmail.com',
                'recoveryEmail' => 'titoko@gmail.com',
                'password' => bcrypt('zxc'),
                'role' => 0,
                'created_at' => '2022-06-01'
            ],
            [
                'id' => 7,
                'email' => 'salao_emman@gmail.com',
                'recoveryEmail' => 'delcjoshua1987@gmail.com',
                'password' => bcrypt('zxc'),
                'role' => 0,
                'created_at' => '2022-06-01'
            ],
        ];
        $parents = [
            [
                'firstName' => 'Karen',
                'lastName' => 'Reyes',
                'middleName' => 'Dela Cruz',
                'sex' => 'F',
                'address' => 'Pacita Complex, San Pedro, Laguna',
                'birthDate' => '1993-07-23',
                'status' => 1,
                'created_at' => '2022-06-01',
                'user_id' => 3,
                'created_by' => 2,
                'image' => 'admin/parents/1.png'
            ],
            [
                'firstName' => 'Byron James',
                'lastName' => 'Ramos',
                'middleName' => 'Regalado',
                'sex' => 'M',
                'address' => 'Villa Milagros, Rodriguez, Rizal',
                'birthDate' => '1993-07-23',
                'status' => 1,
                'created_at' => '2022-06-01',
                'user_id' => 6,
                'created_by' => 2,
                'image' => 'admin/parents/2.png'
            ],
            [
                'firstName' => 'Emmanuel',
                'lastName' => 'Salao',
                'middleName' => 'Noveno Cruz',
                'sex' => 'M',
                'address' => 'San Mateo, Rizal',
                'birthDate' => '1993-07-23',
                'status' => 1,
                'created_at' => '2022-06-01',
                'user_id' => 7,
                'created_by' => 2,
                'image' => 'admin/parents/3.png'
            ]
        ];
        User::insert($parentUser);
        Guardian::insert($parents);

        // Students
        DB::table('students')->delete();
        $students = [
            [
                'grade' => 4,
                'section' => 'Sampaguita',
                'adviser' => 'Abigayle Ramos',
                'firstName' => 'Karina',
                'lastName' => 'Reyes',
                'middleName' => 'Dela Cruz',
                'sex' => 'F',
                'birthDate' => '2012-09-17',
                'status' => 1,
                'created_at' => '2022-06-01',
                'parent_id' => 1,
                'created_by' => 2,
                'QR' => 'admin/qrs/1.png',
                'image' => 'admin/students/1.png'
            ],
            [
                'grade' => 4,
                'section' => 'Sampaguita',
                'adviser' => 'Abigayle Ramos',
                'firstName' => 'Queenierich',
                'lastName' => 'Reyes',
                'middleName' => 'Dela Cruz',
                'sex' => 'F',
                'birthDate' => '2012-09-17',
                'status' => 1,
                'created_at' => '2022-06-01',
                'parent_id' => 1,
                'created_by' => 2,
                'QR' => 'admin/qrs/2.png',
                'image' => 'admin/students/2.png'
            ],
            [
                'grade' => 4,
                'section' => 'Sampaguita',
                'adviser' => 'Abigayle Ramos',
                'firstName' => 'Aaron James',
                'lastName' => 'Ramos',
                'middleName' => 'Fernandez',
                'sex' => 'F',
                'birthDate' => '2012-09-17',
                'status' => 1,
                'created_at' => '2022-06-01',
                'parent_id' => 2,
                'created_by' => 2,
                'QR' => 'admin/qrs/3.png',
                'image' => 'admin/students/3.png'
            ],
            [
                'grade' => 4,
                'section' => 'Sampaguita',
                'adviser' => 'Abigayle Ramos',
                'firstName' => 'Jessica Marie Joy',
                'lastName' => 'Salao',
                'middleName' => 'Sy',
                'sex' => 'F',
                'birthDate' => '2012-09-17',
                'status' => 1,
                'created_at' => '2022-06-01',
                'parent_id' => 3,
                'created_by' => 2,
                'QR' => 'admin/qrs/4.png',
                'image' => 'admin/students/4.png'
            ],
            [
                'grade' => 4,
                'section' => 'Sampaguita',
                'adviser' => 'Abigayle Ramos',
                'firstName' => 'Rachelle Marianne',
                'lastName' => 'Dimaranan',
                'middleName' => 'Sarinas',
                'sex' => 'F',
                'birthDate' => '2012-09-17',
                'status' => 1,
                'created_at' => '2022-06-01',
                'parent_id' => 3,
                'created_by' => 2,
                'QR' => 'admin/qrs/5.png',
                'image' => 'admin/students/5.png'
            ]
        ];
        Student::insert($students);

        // Philfct
        DB::table('philfcts')->delete();
        // $philfcts = [
        //     [
        //         'id' => 1, // R014
        //         'philfct_id' => 'R014',
        //         'name' => 'Spaghetti',
        //         'kcal' => 83,
        //         'totFat' => 1,
        //         'satFat' => 0.35,
        //         'sugar' => 2.9,
        //         'sodium' => 277
        //     ],
        //     [
        //         'id' => 2, // 'R013',
        //         'philfct_id' => 'R013',
        //         'name' => 'Goto',
        //         'kcal' => 53,
        //         'totFat' => 1.3,
        //         'satFat' => 0.84,
        //         'sugar' => 0.2,
        //         'sodium' => 179
        //     ],
        //     [
        //         'id' => 3, // 'E102',
        //         'philfct_id' => 'E102',
        //         'name' => 'Turon',
        //         'kcal' => 259,
        //         'totFat' => 6.4,
        //         'satFat' => 5.41,
        //         'sugar' => 28.8,
        //         'sodium' => 89
        //     ],
        //     [
        //         'id' => 4, // Rice
        //         'philfct_id' => null,
        //         'name' => 'Rice',
        //         'kcal' => 129,
        //         'totFat' => 0.2,
        //         'satFat' => 0.05,
        //         'sugar' => 0.1,
        //         'sodium' => 3
        //     ],
        //     [
        //         'id' => 5, // 'Hotdog',
        //         'philfct_id' => null,
        //         'name' => 'Hotdog',
        //         'kcal' => 226,
        //         'totFat' => 17,
        //         'satFat' => 6.21,
        //         'sugar' => 2.9,
        //         'sodium' => 698
        //     ]
        // ];
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

        // Foods
        DB::table('foods')->delete();
        // $foods = [
        //     [
        //         'id' => '1',
        //         'name' => 'Spaghetti',
        //         'description' => 'Filipino Style Classic Spaghetti',
        //         'price' => 50.00,
        //         'stock' => 20,
        //         'servingSize' => 100.00,
        //         'calcKcal' => 83,
        //         'calcTotFat' => 1,
        //         'calcSatFat' => 0.35,
        //         'calcSugar' => 2.9,
        //         'calcSodium' => 277,
        //         'created_at' => '2022-05-15',
        //         'philfct_id' => 1, // 'R014',
        //         // created_by
        //         'created_by' => 2
        //     ],
        //     [
        //         'id' => '2',
        //         'name' => 'Goto',
        //         'description' => 'Classic Goto with Beef Tripe',
        //         'price' => 50.00,
        //         'stock' => 20,
        //         'servingSize' => 100.00,
        //         'calcKcal' => 53,
        //         'calcTotFat' => 1.3,
        //         'calcSatFat' => 0.84,
        //         'calcSugar' => 0.2,
        //         'calcSodium' => 179,
        //         'created_at' => '2022-05-15',
        //         'philfct_id' => 2, // 'R013',
        //         'created_by' => 2
        //     ],
        //     [
        //         'id' => '3',
        //         'name' => 'Turon',
        //         'description' => 'Sweet Banana Lumpia',
        //         'price' => 50.00,
        //         'stock' => 20,
        //         'servingSize' => 100.00,
        //         'calcKcal' => 259,
        //         'calcTotFat' => 6.4,
        //         'calcSatFat' => 5.41,
        //         'calcSugar' => 28.8,
        //         'calcSodium' => 89,
        //         'created_at' => '2022-05-15',
        //         'philfct_id' => 3, // 'E012',
        //         'created_by' => 2
        //     ]
        // ];
        $foods = [
            [
                'id' => 1,
                'name' => 'Spaghetti',
                'calcKcal' => 83,
                'calcTotFat' => 1,
                'calcSatFat' => 0.35,
                'calcSugar' => 2.9,
                'calcSodium' => 277,
                'description' => 'Filipino sweet style spaghetti',
                'type' => 3,
                'price' => 50,
                'servingSize' => 100,
                'philfct_id' => 2,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 4,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => null
            ],
            [
                'id' => 2,
                'name' => 'Rice',
                'calcKcal' => 129,
                'calcTotFat' => 0.2,
                'calcSatFat' => 0.05,
                'calcSugar' => 0.1,
                'calcSodium' => 3,
                'description' => 'One cup rice/kanin',
                'type' => 0,
                'price' => 15,
                'servingSize' => 100,
                'philfct_id' => 2,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 4,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => 'admin/foods/jO9BxaA4YnEGJKwrZ9fJly8PdV050qGQUCVVqmhG.jpg'
            ],
            [
                'id' => 3,
                'name' => 'Hotdog',
                'calcKcal' => 226,
                'calcTotFat' => 17,
                'calcSatFat' => 6.21,
                'calcSugar' => 2.9,
                'calcSodium' => 698,
                'description' => '1 pc hotdog',
                'type' => 3,
                'price' => 25,
                'servingSize' => 100,
                'philfct_id' => null,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 9,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => null
            ],
            [
                'id' => 4,
                'name' => 'Corned Beef',
                'calcKcal' => 168,
                'calcTotFat' => 10.7,
                'calcSatFat' => 4.51,
                'calcSugar' => 0,
                'calcSodium' => 567,
                'description' => 'Cooked Corned Beef',
                'type' => 3,
                'price' => 25,
                'servingSize' => 100,
                'philfct_id' => null,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 7,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => null
            ],
            [
                'id' => 5,
                'name' => 'Luncheon Meat',
                'calcKcal' => 307,
                'calcTotFat' => 26.4,
                'calcSatFat' => 8.9,
                'calcSugar' => 3,
                'calcSodium' => 956,
                'description' => 'Maling with 1 cup rice',
                'type' => 3,
                'price' => 25,
                'servingSize' => 100,
                'philfct_id' => null,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 10,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => null
            ],
            [
                'id' => 6,
                'name' => 'Maling',
                'calcKcal' => 296,
                'calcTotFat' => 25,
                'calcSatFat' => 8.9,
                'calcSugar' => 2.8,
                'calcSodium' => 902,
                'description' => 'Maling with 1 cup rice',
                'type' => 3,
                'price' => 25,
                'servingSize' => 100,
                'philfct_id' => null,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 10,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => null
            ],
            [
                'id' => 7,
                'name' => 'Fried Chicken',
                'calcKcal' => null,
                'calcTotFat' => null,
                'calcSatFat' => null,
                'calcSugar' => null,
                'calcSodium' => null,
                'description' => '1 pc fried chicken with 1 cup rice',
                'type' => 3,
                'price' => 40,
                'servingSize' => 100,
                'philfct_id' => 3,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => null,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => 'admin/foods/f9TGILl7QGvcfTjhek46teoo4H4ZUJbgTvYir7lk.jpg'
            ],
            [
                'id' => 8,
                'name' => 'Longganisa',
                'calcKcal' => 315,
                'calcTotFat' => 22.7,
                'calcSatFat' => 6.93,
                'calcSugar' => 0,
                'calcSodium' => 714,
                'description' => 'Longganisa',
                'type' => 3,
                'price' => 25,
                'servingSize' => 100,
                'philfct_id' => null,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 10,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => null
            ],
            [
                'id' => 9,
                'name' => 'Goto',
                'calcKcal' => 71,
                'calcTotFat' => 1.1,
                'calcSatFat' => 0.9,
                'calcSugar' => 0.1,
                'calcSodium' => 1,
                'description' => 'with laman',
                'type' => 3,
                'price' => 25,
                'servingSize' => 100,
                'philfct_id' => null,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 4,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => null
            ],
            [
                'id' => 10,
                'name' => 'Pork Siomai',
                'calcKcal' => 298,
                'calcTotFat' => 16.7,
                'calcSatFat' => 4.9,
                'calcSugar' => 1.2,
                'calcSodium' => 291,
                'description' => 'Pork Siomai with Toyo and Calamansi',
                'type' => 3,
                'price' => 25,
                'servingSize' => 100,
                'philfct_id' => 4,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 7,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => 'admin/foods/9Q4jdARgFWSCEQ7bUadFvUNWc2N6NF0Glo7jTvn9.jpg'
            ],
            [
                'id' => 11,
                'name' => 'Pork Siopao',
                'calcKcal' => 294,
                'calcTotFat' => 11.2,
                'calcSatFat' => 4.75,
                'calcSugar' => 0,
                'calcSodium' => 0,
                'description' => 'one serving of pork siopao',
                'type' => 2,
                'price' => 15,
                'servingSize' => 100,
                'philfct_id' => 5,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 6,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => 'admin/foods/je63C556Yvey05TuDDKYW8hNsQgW1PFY2moJgDHW.jpg'
            ],
            [
                'id' => 12,
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
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 9,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => 'admin/foods/rZH3mvnX8UB6Hq6Ozmeoa9jXOm9dqnhxQfzymkfH.jpg'
            ],
            [
                'id' => 13,
                'name' => 'Sweet Ham',
                'calcKcal' => 117,
                'calcTotFat' => 4.4,
                'calcSatFat' => 1.34,
                'calcSugar' => 2.9,
                'calcSodium' => 1208,
                'description' => 'serving of sweet pork ham with rice',
                'type' => 3,
                'price' => 15,
                'servingSize' => 100,
                'philfct_id' => 7,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 7,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => 'admin/foods/zOJOuL6wYG5k0AnNRAcpCQAC3QWnNwUJ5WXZE2mW.png'
            ],
            [
                'id' => 14,
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
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 7,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => 'admin/foods/GdIoPpclSPdII2lKrHJbJAN8gludM67e7VhL5hh5.jpg'
            ],
            [
                'id' => 15,
                'name' => 'Cheesedog',
                'calcKcal' => 245,
                'calcTotFat' => 18.1,
                'calcSatFat' => 6.19,
                'calcSugar' => 5,
                'calcSodium' => 1088,
                'description' => '1 pc cheesedog',
                'type' => 3,
                'price' => 25,
                'servingSize' => 100,
                'philfct_id' => null,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 10,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => null
            ],
            [
                'id' => 16,
                'name' => 'Turon',
                'calcKcal' => 259,
                'calcTotFat' => 6.4,
                'calcSatFat' => 5.41,
                'calcSugar' => 28.8,
                'calcSodium' => 89,
                'description' => '1 pc banana turon',
                'type' => 2,
                'price' => 15,
                'servingSize' => 100,
                'philfct_id' => 9,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 9,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => 'admin/foods/lNdfPwA9KryUmvOBdq8PWP1JnBFuN2UrtZJXU53Y.jpg'
            ],
            [
                'id' => 17,
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
                'philfct_id' => 10,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 5,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => 'admin/foods/ekSwfiTRPA6gLxqlVJTinpKz661Pzx9JK6tbSc1R.jpg'
            ],
            [
                'id' => 18,
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
                'philfct_id' => 11,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 5,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => 'admin/foods/9pKj74GAOi9UurQi9VXT57ASdIVZpjg483GHLEnl.png'
            ],
            [
                'id' => 19,
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
                'philfct_id' => 12,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 6,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => 'admin/foods/duo90djmkotGY08F9Nd47ni4N5EQyRoeMFdle60E.jpg'
            ],
            [
                'id' => 20,
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
                'philfct_id' => 13,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 5,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => 'admin/foods/J1rToNz3wZbAHLRYO8sG0CRqdXWHZjvjcmns8bz5.jpg'
            ],
            [
                'id' => 21,
                'name' => 'Coco honey biscuit',
                'calcKcal' => 63.42,
                'calcTotFat' => 1.554,
                'calcSatFat' => 2.856,
                'calcSugar' => 4.2,
                'calcSodium' => 1.12,
                'description' => 'cocohoney biscuit',
                'type' => 2,
                'price' => 10,
                'servingSize' => 14,
                'philfct_id' => 14,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 8,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => 'admin/foods/uOhYEy9oGXS4oxrLjQVqHD5XdnitjOYuGXmIGMjh.png'
            ],
            [
                'id' => 22,
                'name' => 'Curly tops',
                'calcKcal' => 25.9,
                'calcTotFat' => 0.8235,
                'calcSatFat' => 2.58,
                'calcSugar' => 0.5,
                'calcSodium' => 0.5,
                'description' => 'curly tops milk chocolate candy',
                'type' => 0,
                'price' => 3,
                'servingSize' => 5,
                'philfct_id' => 15,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 9,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => 'admin/foods/WJsx3zkAjX6u11r7klWKcfzfv2po3sSjR0SFFKaL.jpg'
            ],
            [
                'id' => 23,
                'name' => 'Peanut Brittle',
                'calcKcal' => 118.32,
                'calcTotFat' => 5.808,
                'calcSatFat' => 1.2672,
                'calcSugar' => 11.76,
                'calcSodium' => 101.76,
                'description' => 'peanut brittle candy snack',
                'type' => 0,
                'price' => 20,
                'servingSize' => 20,
                'philfct_id' => 16,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 11,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => 'admin/foods/kwxRFgzr3STAUs1yFS7QtEaBQuNyviCEwsqwSuWY.jpg'
            ],
            [
                'id' => 24,
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
                'philfct_id' => 17,
                'created_by' => 2,
                'updated_by' => 3,
                'stock' => 40,
                'grade' => 5,
                'created_at' => Carbon::today()->format('Y-m-d'),
                'image' => 'admin/foods/pXWFQGOmYKkwJHcGmx9eHc26tuDRFVWwUwctBZvc.jpg'
            ]
        ];
        Food::insert($foods);

        // Menu
        DB::table('menus')->delete();
        $menus = [
            // Permanents beverages
            [
                'food_id' => 17,
                'status' => 0,
                'created_at' => Carbon::yesterday()->format('Y-m-d'),
                'displayed_at' => null,
                'removed_at' => null,
                'created_by' => 2
            ],
            [
                'food_id' => 18,
                'status' => 0,
                'created_at' => Carbon::yesterday()->format('Y-m-d'),
                'displayed_at' => null,
                'removed_at' => null,
                'created_by' => 2
            ],
            [
                'food_id' => 19,
                'status' => 0,
                'created_at' => Carbon::yesterday()->format('Y-m-d'),
                'displayed_at' => null,
                'removed_at' => null,
                'created_by' => 2
            ],
            [
                'food_id' => 20,
                'status' => 0,
                'created_at' => Carbon::yesterday()->format('Y-m-d'),
                'displayed_at' => null,
                'removed_at' => null,
                'created_by' => 2
            ],
            // Permanent Snacks
            [
                'food_id' => 11,
                'status' => 0,
                'created_at' => Carbon::yesterday()->format('Y-m-d'),
                'displayed_at' => null,
                'removed_at' => null,
                'created_by' => 2
            ],
            [
                'food_id' => 16,
                'status' => 0,
                'created_at' => Carbon::yesterday()->format('Y-m-d'),
                'displayed_at' => null,
                'removed_at' => null,
                'created_by' => 2
            ],
            [
                'food_id' => 21,
                'status' => 0,
                'created_at' => Carbon::yesterday()->format('Y-m-d'),
                'displayed_at' => null,
                'removed_at' => null,
                'created_by' => 2
            ],
            // Permanent Cooked Meals
            [
                'food_id' => 1,
                'status' => 0,
                'created_at' => Carbon::yesterday()->format('Y-m-d'),
                'displayed_at' => null,
                'removed_at' => null,
                'created_by' => 2
            ],
            [
                'food_id' => 3,
                'status' => 0,
                'created_at' => Carbon::yesterday()->format('Y-m-d'),
                'displayed_at' => null,
                'removed_at' => null,
                'created_by' => 2
            ],
            [
                'food_id' => 4,
                'status' => 0,
                'created_at' => Carbon::yesterday()->format('Y-m-d'),
                'displayed_at' => null,
                'removed_at' => null,
                'created_by' => 2
            ],
            [
                'food_id' => 5,
                'status' => 0,
                'created_at' => Carbon::yesterday()->format('Y-m-d'),
                'displayed_at' => null,
                'removed_at' => null,
                'created_by' => 2
            ],
            [
                'food_id' => 6,
                'status' => 0,
                'created_at' => Carbon::yesterday()->format('Y-m-d'),
                'displayed_at' => null,
                'removed_at' => null,
                'created_by' => 2
            ],
            // Temporary COoked Meals
            [
                'food_id' => 7,
                'status' => 1,
                'created_at' => Carbon::yesterday()->format('Y-m-d'),
                'displayed_at' => Carbon::today()->format('Y-m-d'),
                'removed_at' => '2022-11-18',
                'created_by' => 2
            ],
            [
                'food_id' => 8,
                'status' => 1,
                'created_at' => Carbon::yesterday()->format('Y-m-d'),
                'displayed_at' => Carbon::today()->format('Y-m-d'),
                'removed_at' => '2022-11-18',
                'created_by' => 2
            ],
            [
                'food_id' => 9,
                'status' => 1,
                'created_at' => Carbon::yesterday()->format('Y-m-d'),
                'displayed_at' => Carbon::today()->format('Y-m-d'),
                'removed_at' => '2022-11-18',
                'created_by' => 2
            ],
            [
                'food_id' => 10,
                'status' => 1,
                'created_at' => Carbon::yesterday()->format('Y-m-d'),
                'displayed_at' => Carbon::today()->format('Y-m-d'),
                'removed_at' => '2022-11-18',
                'created_by' => 2
            ],
            [
                'food_id' => 12,
                'status' => 1,
                'created_at' => Carbon::yesterday()->format('Y-m-d'),
                'displayed_at' => Carbon::today()->format('Y-m-d'),
                'removed_at' => '2022-11-18',
                'created_by' => 2
            ]
        ];
        Menu::insert($menus);

        // Payments
        DB::table('payments')->delete();
        $payments = [
            [
                'id' => 1,
                'parent_id' => 1,
                'student_id' => 1,
                'method' => 'GCash',
                'referenceNo' => 123456789
            ]
        ];
        Payment::insert($payments);

        // Purchases
        DB::table('purchases')->delete();
        $purchases = [
            [
                'id' => 1,
                'parent_id' => 1,
                'student_id' => 1,
                'totalAmount' => 50.00,
                'totalKcal' => 83,
                'totalTotFat' => 1,
                'totalSatFat' => 0.35,
                'totalSugar' => 2.9,
                'totalSodium' => 277,
                'payment_id' => 1,
                'claimStatus' => 0,
                'type' => 0,
                'created_at' => Carbon::yesterday()->format('Y-m-d'),
                'served_by' => 2
            ],
            [
                'id' => 2,
                'parent_id' => 1,
                'student_id' => 2,
                'totalAmount' => 60.00,
                'totalKcal' => 515,
                'totalTotFat' => 20.2,
                'totalSatFat' => 15.31,
                'totalSugar' => 27.5,
                'totalSodium' => 1630,
                'payment_id' => 1,
                'claimStatus' => 0,
                'type' => 0,
                'served_by' => 2,
                'created_at' => Carbon::yesterday()->format('Y-m-d')
            ],
            [
                'id' => 3,
                'parent_id' => 1,
                'student_id' => 2,
                'totalAmount' => 60.00,
                'totalKcal' => 515,
                'totalTotFat' => 20.2,
                'totalSatFat' => 15.31,
                'totalSugar' => 27.5,
                'totalSodium' => 1630,
                'payment_id' => 1,
                'claimStatus' => 0,
                'type' => 0,
                'served_by' => 2,
                'created_at' => Carbon::yesterday()->format('Y-m-d')
            ],
            [
                'id' => 4,
                'parent_id' => 1,
                'student_id' => 1,
                'totalAmount' => 60.00,
                'totalKcal' => 515,
                'totalTotFat' => 20.2,
                'totalSatFat' => 15.31,
                'totalSugar' => 27.5,
                'totalSodium' => 1630,
                'payment_id' => 1,
                'claimStatus' => 0,
                'type' => 0,
                'served_by' => 2,
                'created_at' => '2022-11-15'
            ],
            [
                'id' => 5,
                'parent_id' => 1,
                'student_id' => 2,
                'totalAmount' => 60.00,
                'totalKcal' => 515,
                'totalTotFat' => 20.2,
                'totalSatFat' => 15.31,
                'totalSugar' => 27.5,
                'totalSodium' => 1630,
                'payment_id' => 1,
                'claimStatus' => 0,
                'type' => 0,
                'served_by' => 2,
                'created_at' => '2022-11-15'
            ],
            [
                'id' => 6,
                'parent_id' => 1,
                'student_id' => 1,
                'totalAmount' => 60.00,
                'totalKcal' => 515,
                'totalTotFat' => 20.2,
                'totalSatFat' => 15.31,
                'totalSugar' => 27.5,
                'totalSodium' => 1630,
                'payment_id' => 1,
                'claimStatus' => 0,
                'type' => 0,
                'served_by' => 2,
                'created_at' => '2022-11-15'
            ],
            [
                'id' => 7,
                'parent_id' => 1,
                'student_id' => 2,
                'totalAmount' => 60.00,
                'totalKcal' => 515,
                'totalTotFat' => 20.2,
                'totalSatFat' => 15.31,
                'totalSugar' => 27.5,
                'totalSodium' => 1630,
                'payment_id' => 1,
                'claimStatus' => 0,
                'type' => 0,
                'served_by' => 2,
                'created_at' => '2022-11-15'
            ],
            [
                'id' => 8,
                'parent_id' => 1,
                'student_id' => 1,
                'totalAmount' => 60.00,
                'totalKcal' => 515,
                'totalTotFat' => 20.2,
                'totalSatFat' => 15.31,
                'totalSugar' => 27.5,
                'totalSodium' => 1630,
                'payment_id' => 1,
                'claimStatus' => 0,
                'type' => 0,
                'served_by' => 2,
                'created_at' => '2022-11-15'
            ]
        ];
        Purchase::insert($purchases);

        // Orders
        DB::table('orders')->delete();
        $orders = [
            [
                'id' => 1,
                'purchase_id' => 1,
                'food_id' => 1,
                'quantity' => 1,
                'amount' => 50.00,
                'kcal' => 83,
                'totFat' => 1,
                'satFat' => 0.35,
                'sugar' => 2.9,
                'sodium' => 277
            ],
            [
                'id' => 2,
                'purchase_id' => 2,
                'food_id' => 3,
                'quantity' => 1,
                'amount' => 50.00,
                'kcal' => 83,
                'totFat' => 1,
                'satFat' => 0.35,
                'sugar' => 2.9,
                'sodium' => 277
            ],
            [
                'id' => 3,
                'purchase_id' => 2,
                'food_id' => 24,
                'quantity' => 1,
                'amount' => 50.00,
                'kcal' => 83,
                'totFat' => 1,
                'satFat' => 0.35,
                'sugar' => 2.9,
                'sodium' => 277
            ],
            [
                'id' => 4,
                'purchase_id' => 2,
                'food_id' => 17,
                'quantity' => 1,
                'amount' => 50.00,
                'kcal' => 83,
                'totFat' => 1,
                'satFat' => 0.35,
                'sugar' => 2.9,
                'sodium' => 277
            ],
            [
                'id' => 5,
                'purchase_id' => 3,
                'food_id' => 9,
                'quantity' => 1,
                'amount' => 50.00,
                'kcal' => 83,
                'totFat' => 1,
                'satFat' => 0.35,
                'sugar' => 2.9,
                'sodium' => 277
            ],
            [
                'id' => 6,
                'purchase_id' => 3,
                'food_id' => 16,
                'quantity' => 1,
                'amount' => 50.00,
                'kcal' => 83,
                'totFat' => 1,
                'satFat' => 0.35,
                'sugar' => 2.9,
                'sodium' => 277
            ],
            [
                'id' => 7,
                'purchase_id' => 1,
                'food_id' => 3,
                'quantity' => 1,
                'amount' => 50.00,
                'kcal' => 83,
                'totFat' => 1,
                'satFat' => 0.35,
                'sugar' => 2.9,
                'sodium' => 277
            ],
            [
                'id' => 8,
                'purchase_id' => 4,
                'food_id' => 3,
                'quantity' => 1,
                'amount' => 50.00,
                'kcal' => 83,
                'totFat' => 1,
                'satFat' => 0.35,
                'sugar' => 2.9,
                'sodium' => 277
            ],
            [
                'id' => 9,
                'purchase_id' => 5,
                'food_id' => 1,
                'quantity' => 1,
                'amount' => 50.00,
                'kcal' => 83,
                'totFat' => 1,
                'satFat' => 0.35,
                'sugar' => 2.9,
                'sodium' => 277
            ],
            [
                'id' => 10,
                'purchase_id' => 5,
                'food_id' => 17,
                'quantity' => 1,
                'amount' => 50.00,
                'kcal' => 83,
                'totFat' => 1,
                'satFat' => 0.35,
                'sugar' => 2.9,
                'sodium' => 277
            ],
            [
                'id' => 11,
                'purchase_id' => 6,
                'food_id' => 3,
                'quantity' => 1,
                'amount' => 50.00,
                'kcal' => 83,
                'totFat' => 1,
                'satFat' => 0.35,
                'sugar' => 2.9,
                'sodium' => 277
            ],
            [
                'id' => 12,
                'purchase_id' => 6,
                'food_id' => 21,
                'quantity' => 1,
                'amount' => 50.00,
                'kcal' => 83,
                'totFat' => 1,
                'satFat' => 0.35,
                'sugar' => 2.9,
                'sodium' => 277
            ],
            [
                'id' => 13,
                'purchase_id' => 6,
                'food_id' => 10,
                'quantity' => 1,
                'amount' => 50.00,
                'kcal' => 83,
                'totFat' => 1,
                'satFat' => 0.35,
                'sugar' => 2.9,
                'sodium' => 277
            ],
            [
                'id' => 14,
                'purchase_id' => 7,
                'food_id' => 24,
                'quantity' => 1,
                'amount' => 50.00,
                'kcal' => 83,
                'totFat' => 1,
                'satFat' => 0.35,
                'sugar' => 2.9,
                'sodium' => 277
            ],
            [
                'id' => 15,
                'purchase_id' => 8,
                'food_id' => 3,
                'quantity' => 1,
                'amount' => 50.00,
                'kcal' => 83,
                'totFat' => 1,
                'satFat' => 0.35,
                'sugar' => 2.9,
                'sodium' => 277
            ],
            [
                'id' => 16,
                'purchase_id' => 8,
                'food_id' => 21,
                'quantity' => 1,
                'amount' => 50.00,
                'kcal' => 83,
                'totFat' => 1,
                'satFat' => 0.35,
                'sugar' => 2.9,
                'sodium' => 277
            ],
            [
                'id' => 17,
                'purchase_id' => 8,
                'food_id' => 23,
                'quantity' => 1,
                'amount' => 50.00,
                'kcal' => 83,
                'totFat' => 1,
                'satFat' => 0.35,
                'sugar' => 2.9,
                'sodium' => 277
            ]
        ];
        Order::insert($orders);
    }
}

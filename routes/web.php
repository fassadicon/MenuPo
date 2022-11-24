<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
// Admin Controllers
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AutocompleteController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\ScannerController;

use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\GuardianController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuSuggestionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/qrcode', function () {
//     return QrCode::size(300)->generate('A basic example of QR code!');
// });

Route::get('/test', [TestController::class, 'index']);
Route::get('/testData', [TestController::class, 'getData'])->name('test.chart');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// <------------------- ALL ADMIN ROUTES -------------------> //
Route::prefix('admin')->middleware('admin')->group(function () {
    // Show Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // <----------- FOOD CONTROLLER -----------> //
    // Show Food Management Section
    Route::get('/foods', [FoodController::class, 'index'])->name('food.index');
    // Show Creation Form
    Route::get('/foods/create', [FoodController::class, 'create']);
    // Store Food Data
    Route::post('/foods', [FoodController::class, 'store']);
    // Show Edit Form
    Route::get('/foods/{food}/edit', [FoodController::class, 'edit']);
    // Update Food Data from Edit Form
    Route::put('/foods/{food}', [FoodController::class, 'update']);
    // Show Food Data from Modal
    Route::get('/foods/{id}/view', [FoodController::class, 'view'])->name('food.view');

    // <----------- MENU CONTROLLER -----------> //
    // DataTables
    Route::get('/menu', [MenuController::class, 'cookedMeals'])->name('menu.index');
    Route::get('/menu/snacks', [MenuController::class, 'snacks'])->name('menu.snacks');
    Route::get('/menu/beverages', [MenuController::class, 'beverages'])->name('menu.beverages');
    Route::get('/menu/others', [MenuController::class, 'others'])->name('menu.others');

    // DataTable Buttons
    // Add New Menu Item
    Route::post('/menu/addMenuItem', [MenuController::class, 'addMenuItem'])->name('menu.addMenuItem');
    // Get Current Stock of Food Item in Autocomplete
    Route::get('/menu/{id}/getCurrentStock', [MenuController::class, 'getCurrentStock']);
    // Update Food Item Detail Button
    Route::get('/menu/{id}/editFoodDetails', [MenuController::class, 'editFoodDetails']);
    Route::post('/menu/updateMenuItem', [MenuController::class, 'updateMenuItem'])->name('menu.updateMenuItem');


    // PREVIEW SECTION
    // Preview Content
    Route::get('/menu/{id}/preview', [MenuController::class, 'preview'])->name('food.preview');
     // Get Menu Item Details for Modal
     Route::get('/menu/{id}/getMenuItemDetails', [MenuController::class, 'getMenuItemDetails'])->name('menu.getMenuItemDetails');
    // Add additional stock
    Route::post('/menu/addAdditionalStock', [MenuController::class, 'updateMenuItemStock'])->name('menu.addAdditionalStock');
    // Update Menu Item Date and Status
    Route::post('/menu/updateMenuDateRange', [MenuController::class, 'updateMenuDateRange'])->name('menu.updateMenuDateRange');
    // Update 
    // Show Stock Quantity from Modal


    // MENU SUGGESTION CONTROLLER
    Route::get('/menu-suggestion', [MenuSuggestionController::class, 'suggestion']);
    Route::get('/menu-suggestion/suggest', [MenuSuggestionController::class, 'suggest']);
    Route::post('/menu-suggestion/publish', [MenuSuggestionController::class, 'publish']);
    // Autocomplete search for PhilFCT

    // <----------- ORDER CONTROLLER -----------> //
    // Show Scanner Section
    Route::get('/orders/scanner', [ScannerController::class, 'index']);
    // Scan QR Code
    Route::get('/orders/scanner/{id}/view', [ScannerController::class, 'view']);
    // Complete order
    Route::post('/orders/scanner/{sid}/{pid}/complete', [ScannerController::class, 'complete']);
    // End of Admin-enclosed Routes

    // <----------- USER CONTROLLER -----------> //
    // Admin Account Management
    Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
    Route::get('/admins/{id}/view', [AdminController::class, 'view'])->name('admins.view');
    Route::get('/admins/create', [AdminController::class, 'create']);
    Route::post('/admins/store', [AdminController::class, 'store']);
    Route::get('/admins/{admin}/edit', [AdminController::class, 'edit']);
    Route::put('/admins/{admin}', [AdminController::class, 'update']);
    // Parent Account Management
    Route::get('/guardians', [GuardianController::class, 'index'])->name('guardians.index');
    Route::get('/guardians/{id}/view', [GuardianController::class, 'view'])->name('guardian.view');
    Route::get('/guardians/create', [GuardianController::class, 'create']);
    Route::post('/guardians/store', [GuardianController::class, 'store']);
    Route::get('/guardians/{guardian}/edit', [GuardianController::class, 'edit']);
    Route::put('/guardians/{guardian}', [GuardianController::class, 'update']);
    // Student Account Management
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/{id}/view', [StudentController::class, 'view'])->name('student.view');
    Route::get('/students/create', [StudentController::class, 'create']);
    Route::post('/students/create/store', [StudentController::class, 'store']);
    Route::get('/students/{student}/edit', [StudentController::class, 'edit']);
    Route::put('/students/{student}', [StudentController::class, 'update']);
    
    // REPORTS, GRAPHS, and INFORMATION
    Route::get('/reports/foodIntake', [ReportsController::class, 'index'])->name('reports.index');
    Route::get('/reports/countFoodsBasedInColor/{type}', [ReportsController::class, 'countFoodsBasedInColor'])->name('reports.countFoodsBasedInColor');
    Route::get('/reports/aveGradePerType/{type}', [ReportsController::class, 'aveGradePerType'])->name('reports.aveGradePerType');
});


Route::get('/autocomplete-search', [AutocompleteController::class, 'autocompleteSearch']);
Route::get('/autocomplete-search-foods', [AutocompleteController::class, 'autocompleteSearchFoods']);
Route::get('/getPhilFCTFood/{name}/view', [AutocompleteController::class, 'getPhilFCTFood']);
Route::get('/autocomplete-search-parents', [AutocompleteController::class, 'getParent']);
// Route::get('/check-philfct/{name}/view', [AutocompleteController::class, 'checkPhilFCTitem']);
// END OF ALL ADMIN ROUTES

// Show Food Management Section
Route::get('/dt', [TestController::class, 'dt'])->name('food.test');


//User /////////////////////////////////////////////////////////////////

Route::get('user/home', [HomeController::class, 'index']);

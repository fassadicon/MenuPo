<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
// Admin Controllers
use App\Http\Controllers\Admin\POSController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\User\HealthController;
use App\Http\Controllers\User\SurveyController;

use App\Http\Controllers\AutocompleteController;
use App\Http\Controllers\User\NewPostController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\UserAccController;

// User Controllers
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\ScannerController;

use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\User\UserMenuController;
use App\Http\Controllers\Admin\GuardianController;
use App\Http\Controllers\Admin\BMIReportController;
use App\Http\Controllers\Admin\CompletedController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PurchasesController;
use App\Http\Controllers\User\CartSummaryController;
use App\Http\Controllers\Admin\ImportUsersController;
use App\Http\Controllers\Admin\SurveyReportController;
use App\Http\Controllers\Admin\MenuSuggestionController;
use App\Http\Controllers\Admin\CompositionsReportController;
use App\Http\Controllers\Admin\ConfirmPaymentTableController;
use App\Http\Controllers\Admin\DownloadReportsController;
use App\Http\Controllers\Admin\SalesReportController;
use App\Http\Controllers\Admin\StudentNutrientReportController;

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
    // Delete Food Data
    Route::get('/foods/{id}/delete', [FoodController::class, 'delete'])->name('food.delete');
    // Show Food Data Trash
    Route::get('/foods/trash', [FoodController::class, 'trash'])->name('food.trash');
    // Delete Food Data
    Route::get('/foods/{id}/restore', [FoodController::class, 'restore'])->name('food.restore');
    // Show Food Data from Modal
    Route::get('/foods/{id}/trash', [FoodController::class, 'viewTrash'])->name('food.viewTrash');

    // <----------- MENU CONTROLLER -----------> //
    // DataTables
    Route::get('/menu', [MenuController::class, 'cookedMeals'])->name('menu.indexAdmin');
    Route::get('/menu/pastas', [MenuController::class, 'pastas'])->name('menu.pastas');
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
    //Point of sale
    // Route::get('/pos', [POSController::class, 'index']);
    Route::get('/pos/{sid}', [POSController::class, 'index']);
    Route::post('/pos/add-to-cart', [POSController::class, 'addtocart']);
    Route::post('/pos/update-cart-add', [POSController::class, 'add']);
    Route::post('/pos/update-cart-minus', [POSController::class, 'minus']);
    Route::post('/pos/update-cart-delete', [POSController::class, 'delete']);
    Route::post('/pos/payment/{sid}', [POSController::class, 'pospayment']);
    // Show Scanner Section
    Route::get('/orders/scanner', [ScannerController::class, 'index']);
    // Scan QR Code
    Route::get('/orders/scanner/{id}/view', [ScannerController::class, 'view']);
    // Complete order
    Route::post('/orders/scanner/{sid}/complete', [ScannerController::class, 'complete']);
    // Pending/Unpaid Orders
    Route::get('/orders/pendings', [PurchasesController::class, 'index'])->name('pendings.index');
    // Confirm Pending Orders to Paid 
    Route::get('/orders/pendings/{id}/confirm', [PurchasesController::class, 'confirm'])->name('pendings.confirm');
    // Pending/Unpaid Orders Modal
    Route::get('/orders/pendings/{id}/view', [PurchasesController::class, 'viewPending'])->name('pendings.viewPending');
    // // Orders Placed
    // Route::get('/orders/placed', [OrderController::class, 'index'])->name('orders.index');
    // // Orders Placed Modal
    // Route::get('/orders/placed/{id}/view', [OrderController::class, 'view'])->name('orders.view');
    // // Orders Placed Soft Delete
    // Route::get('/orders/placed/{id}/delete', [OrderController::class, 'delete'])->name('orders.delete');
    // // Orders Placed Trash View
    // Route::get('/orders/placed/trash', [OrderController::class, 'trash'])->name('orders.trash');
    // // Orders Placed Trash Modal
    // Route::get('/orders/placed/{id}/viewTrash', [OrderController::class, 'view'])->name('orders.viewTrash');
    // // Orders Placed Restore
    // Route::get('/orders/placed/{id}/restore', [OrderController::class, 'restore'])->name('orders.restore');
    // Completed Purchases
    Route::get('/orders/completed', [PurchasesController::class, 'completedOrders'])->name('completed.completedOrders');
    // Completed Purchases Modal
    Route::get('/orders/completed/{id}/view', [PurchasesController::class, 'viewCompleted'])->name('completed.view');
    // Confirm Payment
    Route::get('/orders/pendings/{id}/confirm', [PurchasesController::class, 'confirm']);
    // Soft Delete Completed Purchases
    Route::get('/orders/completed/{id}/delete', [PurchasesController::class, 'delete'])->name('completed.delete');
    // Soft Delete Trash Purchases View
    Route::get('/orders/completed/trash', [PurchasesController::class, 'trash'])->name('completed.trash');
    // Soft Delete Trash Purchases View Modal
    Route::get('/orders/completed/{id}/viewTrash', [PurchasesController::class, 'viewTrash'])->name('completed.viewTrash');
    // Soft Delete Restore Purchases
    Route::get('/orders/completed/{id}/restore', [PurchasesController::class, 'restore'])->name('completed.restore');
    // Confirm Payment of Pre Orders Table
    Route::get('/orders/paymentConfirmationTable', [ConfirmPaymentTableController::class, 'index'])->name('paymentConfirmationTable.index');
    // Confirm Pending Orders to Paid 
    // Route::get('/orders/pendings/{id}/confirm', [PurchasesController::class, 'confirm'])->name('pendings.confirm');



    // <----------- USER CONTROLLER -----------> //
    // Admin Account Management
    Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
    Route::get('/admins/{id}/view', [AdminController::class, 'view'])->name('admins.view');
    Route::get('/admins/create', [AdminController::class, 'create']);
    Route::post('/admins/store', [AdminController::class, 'store'])->name('admins.store');
    Route::get('/admins/{admin}/edit', [AdminController::class, 'edit']);
    Route::put('/admins/{admin}', [AdminController::class, 'update'])->name('admins.update');
    Route::get('/admins/{id}/delete', [AdminController::class, 'delete'])->name('admins.delete');
    Route::get('/admins/trash', [AdminController::class, 'trash'])->name('admins.trash');
    Route::get('/admins/trash/{id}/viewTrash', [AdminController::class, 'viewTrash'])->name('admins.viewTrash');
    Route::get('/admins/{id}/restore', [AdminController::class, 'restore'])->name('admins.restore');
    // Parent Account Management
    Route::get('/guardians', [GuardianController::class, 'index'])->name('guardians.index');
    Route::get('/guardians/{id}/view', [GuardianController::class, 'view'])->name('guardian.view');
    Route::get('/guardians/create', [GuardianController::class, 'create']);
    Route::post('/guardians/store', [GuardianController::class, 'store']);
    Route::get('/guardians/{guardian}/edit', [GuardianController::class, 'edit']);
    Route::put('/guardians/{guardian}', [GuardianController::class, 'update']);
    Route::get('/guardians/{id}/delete', [GuardianController::class, 'delete'])->name('guardians.delete');
    Route::get('/guardians/trash', [GuardianController::class, 'trash'])->name('guardians.trash');
    Route::get('/guardians/{id}/restore', [GuardianController::class, 'restore'])->name('guardians.restore');
    // Student Account Management
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/{id}/view', [StudentController::class, 'view'])->name('student.view');
    Route::get('/students/create', [StudentController::class, 'create']);
    Route::post('/students/create/store', [StudentController::class, 'store']);
    Route::get('/students/{student}/edit', [StudentController::class, 'edit']);
    Route::put('/students/{student}', [StudentController::class, 'update']);
    Route::get('/students/{id}/delete', [StudentController::class, 'delete'])->name('student.delete');
    Route::get('/students/trash', [StudentController::class, 'trash'])->name('student.trash');
    Route::get('/students/{id}/restore', [StudentController::class, 'restore'])->name('student.restore');
    // Imports
    Route::get('/imports', [ImportUsersController::class, 'index']);
    Route::post('/imports/upload', [ImportUsersController::class, 'import'])->name('imports.upload');
    Route::get('/imports/viewImportedGuardians', [ImportUsersController::class, 'viewImportedGuardians'])->name('imports.viewImportedGuardians');
    Route::get('/imports/viewImportedStudents', [ImportUsersController::class, 'viewImportedStudents'])->name('imports.viewImportedStudents');
    Route::get('/imports/viewImportedAdmins', [ImportUsersController::class, 'viewImportedAdmins'])->name('imports.viewImportedAdmins');

    // REPORTS, GRAPHS, and INFORMATION
    Route::get('/reports/foodIntake', [ReportsController::class, 'index'])->name('reports.index');
    Route::get('/reports/countFoodsBasedInColor/{type}', [ReportsController::class, 'countFoodsBasedInColor'])->name('reports.countFoodsBasedInColor');
    Route::get('/reports/aveGradePerType/{type}', [ReportsController::class, 'aveGradePerType'])->name('reports.aveGradePerType');
    Route::get('/reports/suggestions', [ReportsController::class, 'mostSuggested'])->name('reports.mostSuggested');

    // Survey
    Route::get('/reports/survey', [SurveyReportController::class, 'index']);
    Route::get('/reports/survey/table', [SurveyReportController::class, 'surveyTable'])->name('survey.table');
    Route::get('/reports/download-survey-report', [SurveyReportController::class, 'download_survey_report']);
    Route::get('/reports/compositions', [CompositionsReportController::class, 'index']);
    Route::get('/reports/download-composition-report', [CompositionsReportController::class, 'download_composition_report']);

    Route::get('/reports/nutrientConsumption', [StudentNutrientReportController::class, 'index']);
    Route::get('/reports/download-calorie-report', [DownloadReportsController::class, 'download_calorie_report']);

    Route::get('/reports/nutrientConsumption/totalFat', [StudentNutrientReportController::class, 'indexTotalFat']);
    Route::get('/reports/download-totalFat-report', [DownloadReportsController::class, 'download_totalFat_report']);

    Route::get('/reports/nutrientConsumption/satFat', [StudentNutrientReportController::class, 'indexSaturatedFat']);
    Route::get('/reports/download-satFat-report', [DownloadReportsController::class, 'download_satFat_report']);

    Route::get('/reports/nutrientConsumption/addedSugar', [StudentNutrientReportController::class, 'indexAddedSugar']);
    Route::get('/reports/download-sugar-report', [DownloadReportsController::class, 'download_sugar_report']);

    Route::get('/reports/nutrientConsumption/sodium', [StudentNutrientReportController::class, 'indexSodium']);
    Route::get('/reports/download-sodium-report', [DownloadReportsController::class, 'download_sodium_report']);

    Route::get('/reports/sales', [SalesReportController::class, 'index']);
    Route::get('/reports/download-sales-report', [DownloadReportsController::class, 'download_sales_report']);

    Route::get('/reports/bmi', [BMIReportController::class, 'index']);
    Route::get('/reports/download-bmi-report', [DownloadReportsController::class, 'download_bmi_report']);
});


Route::get('/autocomplete-search', [AutocompleteController::class, 'autocompleteSearch']);
Route::get('/autocomplete-search-foods', [AutocompleteController::class, 'autocompleteSearchFoods']);
Route::get('/getPhilFCTFood/{name}/view', [AutocompleteController::class, 'getPhilFCTFood']);
Route::get('/autocomplete-search-parents', [AutocompleteController::class, 'getParent']);
// Route::get('/check-philfct/{name}/view', [AutocompleteController::class, 'checkPhilFCTitem']);
// END OF ALL ADMIN ROUTES

// Show Food Management Section
Route::get('/dt', [TestController::class, 'dt'])->name('food.test');



// All User Controller //
Route::middleware('user')->group(function () {

    //Home
    Route::get('/user/home', [HomeController::class, 'index']);
    Route::post('/user/deleteAllNotifs', [HomeController::class, 'deleteAllNotifs']);

    //Health Module
    Route::get('/user/health/{anak}', [HealthController::class, 'index'])->name(name: 'health.index');
    Route::post('/user/health/remove-restrict', [HealthController::class, 'removeRestrict'])->name(name: 'health.remove-restrict');
    Route::get('/health/edit-info/{anak}', [HealthController::class, 'edit']);
    Route::post('/health/saveUpdate', [HealthController::class, 'saveUpdate']);
    Route::get('/user/health-report/{student_id}', [HealthController::class, 'report_index']);
    Route::get('/user/health-report-download/{student}', [HealthController::class, 'download_report']);

    //User-Account Page
    Route::get('/user/user-account', [UserAccController::class, 'index'])->name(name: 'user.account');
    Route::get('/edit-info', [UserAccController::class, 'edit']);
    Route::post('/saveUpdate', [UserAccController::class, 'saveUpdate']);
    Route::post('/user/change-pass-request', [UserAccController::class, 'change_pass_request']);
    Route::get('/user/otp-page', [UserAccController::class, 'otp_page']);
    Route::post('/user/submit-otp', [UserAccController::class, 'submit_otp']);
    Route::get('/user/changepass-page', [UserAccController::class, 'changepass_page']);
    Route::post('/user/submit-password', [UserAccController::class, 'submit_password']);


    //Menu Page
    Route::get('/user/menu/{student}', [UserMenuController::class, 'index'])->name(name: 'menu.index');

    Route::get('/user/menu-landing', [UserMenuController::class, 'landing'])->name(name: 'menu.landing');
    Route::post('/user/menu/addtocart', [UserMenuController::class, 'addtocart']);
    Route::post('/user/menu/addtorestrict', [UserMenuController::class, 'addtorestrict']);

    //Cart Summarry
    Route::get('/user/cart-summary/{anak}', [CartSummaryController::class, 'index'])->name(name: 'cart-summary.index');
    Route::post('/user/cart-summary/update-cart-add', [CartSummaryController::class, 'add']);
    Route::post('/user/cart-summary/update-cart-minus', [CartSummaryController::class, 'minus']);
    Route::post('/user/cart-summary/update-cart-delete', [CartSummaryController::class, 'delete']);

    //Survey Page
    Route::get('/users/survey', [SurveyController::class, 'index']);
    Route::post('/users/survey-submit', [SurveyController::class, 'store'])->name(name: 'survey.store');

    //Payment Page
    Route::post('/user/payment', [PaymentController::class, 'index']);
    //Receipt
    Route::get('/user/receipt/{purchase}', [PaymentController::class, 'receipt_new']);
    // Route::get('user/receipt', [PaymentController::class, 'receipt']);

    // Route::get('/pos', [POSController::class, 'index']);
    // Route::post('/add-to-cart', [POSController::class, 'addtocart']);
    // Route::post('/update-cart-add', [POSController::class, 'add']);
    // Route::post('/update-cart-minus', [POSController::class, 'minus']);
    // Route::post('/update-cart-delete', [POSController::class, 'delete']);
    // Route::post('/pos/payment', [POSController::class, 'pospayment'])->name(name:'pos.order');

    //New Post
    // Route::get('newpost', [NewPostController::class, 'index']);
    // Route::get('newpost/view', [NewPostController::class, 'viewpost']);
    // Route::post('newpost-store', [NewPostController::class, 'store']);

    // Sample
    Route::get('sample', [HomeController::class, 'sample']);
});

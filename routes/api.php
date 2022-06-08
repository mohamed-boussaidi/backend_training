<?php

use App\Http\Controllers\API\FileUploadController;
use App\Http\Controllers\API\MailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CollaborateurController;
use App\Http\Controllers\API\NoteFraisController;
use App\Http\Controllers\API\CongeController;
use App\Http\Controllers\API\SalleController;
use App\Http\Controllers\API\MaterielController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ExpenseReportController;
use App\Http\Controllers\API\SalleReservationController;
use App\Http\Controllers\API\DepenseController;
use App\Http\Controllers\API\TypeDepenseController;










/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//////////////////////////////////////////////////Authentification/////////////////////////////////////////////////////////////////////

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});

//////////////////////////////////////////////////Collaborateurs/////////////////////////////////////////////////////////////////////
//API add Collaborateur
Route::post('/addCollaborateurs', [CollaborateurController::class, 'store']);
//API get Collaborateur
Route::get('/collaborateurs', [CollaborateurController::class, 'index']);
//API modifier Collaborateur
Route::get('/getCollaborateurs/{id}', [CollaborateurController::class, 'getCollaborateur']);
//API Update note de frais
Route::put('/UpdateCollaborateurs/{id}', [CollaborateurController::class, 'update']);
//API delete note de frais
Route::delete('/deleteCollaborateurs/{id}', [CollaborateurController::class, 'destroy']);

//API post login collaborateur
Route::post('/collaborateurlogin', [CollaborateurController::class, 'CollaborateurLogin']);

//API get Stat Collaborateur
Route::get('/statcollaborateurs', [CollaborateurController::class, 'collabStat']);

/////////////////////////////////////////////////////// Gestion des salle////////////////////////////////////////////////////////////////////

//API add salle
Route::post('/addSalle', [SalleController::class, 'store']);
//API get salle
Route::get('/Salles', [SalleController::class, 'index']);
//API modifier salle
Route::get('/getSalle/{id}', [SalleController::class, 'edit']);
 //API Update salle
Route::get('/UpdateSalle/{id}', [SalleController::class, 'update']);
// API delete salle
Route::delete('/deleteSalle/{id}', [SalleController::class, 'destroy']);

//////////////////////////////////////////////////////////////////EMAIL//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//API mail send
Route::get('/send-mail',[MailController::class,'sendEmail'] );

/////////////////////////////////////////////////////////////Gestion des produits////////////////////////////////////////////////////////////////////

//API add produit
Route::post('/addproduct', [ProductController::class, 'store']);
//API get produit
Route::get('/Products', [ProductController::class, 'index']);
//API modifier produit
Route::get('/getProduct/{id}', [ProductController::class, 'getProductById']);
 //API Update produit
Route::put('/UpdateProduct/{id}', [ProductController::class, 'update']);
// API delete produit
Route::delete('/deleteProduct/{id}', [ProductController::class, 'destroy']);




/////////////////////////////////////////////////////////////Gestion des commandes  ////////////////////////////////////////////////////////////////////

//API add order
Route::post('/addorder', [OrderController::class, 'addOrder']);

//API get order
Route::get('/orders', [OrderController::class, 'index']);

//API Update ExpenseReport
Route::put('/Updateorder/{id}', [CongeController::class, 'update']);

//API get Conge
Route::get('/getorder/{id}', [CongeController::class, 'getOrderById']);

// API delete order
Route::delete('/deleteorder/{id}', [OrderController::class, 'deleteOrder']);

// API reject order
Route::get('/rejectorder/{id}', [OrderController::class, 'rejectOrder']);

// API accept order
Route::get('/acceptorder/{id}', [OrderController::class, 'acceptOrder']);

Route::get('/getorderstatbycollaborateur/{id}', [OrderController::class, 'getOrderstatByCollaborateur']);

Route::get('/allorderstat', [OrderController::class, 'AllOrderStat']);


/////////////////////////////////////////////////////////////Gestion des commandes  de Note de frais  ////////////////////////////////////////////////////////////////////

//API add ExpenseReport
Route::post('/addExpense', [ExpenseReportController::class, 'addExpense']);

//API get ExpenseReport
Route::get('/Expenses', [ExpenseReportController::class, 'index']);

 //API Update ExpenseReport
 Route::put('/UpdateExpense/{id}', [ExpenseReportController::class, 'update']);

 //API get ExpenseReport
Route::get('/getExpense/{id}', [ExpenseReportController::class, 'getExpenseById']);

// API delete ExpenseReport
Route::delete('/deleteExpense/{id}', [ExpenseReportController::class, 'deleteExpense']);

// API reject ExpenseReport
Route::get('/rejectExpense/{id}', [ExpenseReportController::class, 'rejectExpense']);

// API accept ExpenseReport
Route::get('/acceptExpense/{id}', [ExpenseReportController::class, 'acceptExpense']);

Route::get('/expensesum/{id}', [ExpenseReportController::class, 'ExpenseSum']);

Route::get('/expensestat', [ExpenseReportController::class, 'ExpenseStat']);

/////////////////////////////////////////////////////////////Gestion des conges ////////////////////////////////////////////////////////////////////

//API add Note de conge
Route::post('/addConge', [CongeController::class, 'addConge']);

//API get Note de conge
Route::get('/Conges', [CongeController::class, 'index']);

 //API Update Conge
Route::put('/UpdateConge/{id}', [CongeController::class, 'update']);

//API get Conge
Route::get('/getConge/{id}', [CongeController::class, 'getCongeById']);

// API delete Note de conge
Route::delete('/deleteConge/{id}', [CongeController::class, 'deleteConge']);

// API reject Note de conge
Route::get('/rejectConge/{id}', [CongeController::class, 'rejectConge']);

// API accept Note de conge
Route::get('/acceptConge/{id}', [CongeController::class, 'acceptConge']);
// API accept Note de conge
Route::get('/getcongestat/{id}', [CongeController::class, 'getCongeStat']);


/////////////////////////////////////////////////////////////Gestion des Reservation_Salle ////////////////////////////////////////////////////////////////////

//API add Note de Reservation
Route::post('/addReservation', [SalleReservationController::class, 'addReservation']);

// API delete Reservation
Route::delete('/deleteReservation/{id}', [SalleReservationController::class, 'deleteReservation']);

//API get Reservation
Route::get('/Reservations', [SalleReservationController::class, 'index']);

Route::get('/reservationstatbycollaborateur/{id}', [SalleReservationController::class, 'ReservationStatByCollaborateur']);

Route::get('/allreservationstat', [SalleReservationController::class, 'AllReservationStat']);

//API Upload Images

Route::post('/uploadImage/users', [FileUploadController::class, 'uploadImageUsers']);
Route::post('/uploadImage/products', [FileUploadController::class, 'uploadImageProducts']);
Route::post('/uploadImage/salles', [FileUploadController::class, 'uploadImageSalles']);


/////////////////////////////////////////////////////////////Gestion des produits////////////////////////////////////////////////////////////////////

//API add Depense
Route::post('/adddepense', [TypeDepenseController::class, 'store']);
//API get Depense
Route::get('/Depenses', [TypeDepenseController::class, 'index']);
//API modifier Depense
Route::get('/getDepense/{id}', [TypeDepenseController::class, 'getDepenseById']);
 //API Update Depense
Route::put('/UpdateDepense/{id}', [TypeDepenseController::class, 'update']);
// API delete Depense
Route::delete('/deleteDepense/{id}', [TypeDepenseController::class, 'destroy']);




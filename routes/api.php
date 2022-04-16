<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::get('coach', 'CoachController@coach');

    //routes nutrition

    Route::post('Nutrition', 'NutritionController@SaveNutrition');
    Route::get('getNutrition', 'NutritionController@getNutrition');
    Route::delete('deleteNutrition/{id}' , 'NutritionController@deleteNutrition');
    Route::get('updateNutrition/{id}' , 'NutritionController@updateNutrition');
    Route::put('editNutrition' , 'NutritionController@editNutrition');
    Route::get('Nutrition/{id}' , 'NutritionController@Nutrition');

    //routes exercice 

    Route::post('Exercice', 'ExerciceController@SaveExercice');
    Route::get('getExercice', 'ExerciceController@getExercice');
    Route::delete('deleteExercice/{id}' , 'ExerciceController@deleteExercice');
    Route::get('updateExercice/{id}' , 'ExerciceController@updateExercice');
    Route::put('editExercice' , 'ExerciceController@editExercice');
    Route::get('Exercice/{id}' , 'ExerciceController@Exercice');

    //routes produit
     
    Route::post('produit', 'ProduitController@SaveProduit');


});


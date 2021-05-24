<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ApiDriverController;
use App\Http\Controllers\ApiDocumentController;
use App\Http\Controllers\ApiDriver_availabilityController;
use App\Http\Controllers\ApiZoneController;
use App\Http\Controllers\ApiLocationController;
use App\Http\Controllers\ApiVehicle_assignmentController;
use App\Http\Controllers\ApiPost_codeController;
use App\Http\Controllers\ApiCustomerController;
use App\Http\Controllers\ApiVehicleTypeController;
use App\Http\Controllers\ApiPolicyController;
use App\Http\Controllers\ApiPaymentGatewayController;
use App\Http\Controllers\ApiPaymentGateway;
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

Route::post('login',[AuthController::class, 'login']);
Route::post('register',[AuthController::class, 'register']);
 


Route::group(
    [
      'middleware'=>'api'
    ]
    , function () {
        Route::get('zone', 'ApiZoneController@index');
        Route::post('zone', 'ApiZoneController@store');
        Route::get('zone/{id}', 'ApiZoneController@show');
        Route::put('zone/{id}', 'ApiZoneController@update');
        Route::delete('zone/{id}', 'ApiZoneController@destroy');
 });
Route::group(
    [
      'middleware'=>'api'
    ]
    , function () {
        Route::get('location', 'ApiLocationController@index');
        Route::post('location', 'ApiLocationController@store');
        Route::get('location/{id}', 'ApiLocationController@show');
        Route::put('location/{id}', 'ApiLocationController@update');
        Route::delete('location/{id}', 'ApiLocationController@destroy');
 });
Route::group(
    [
      'middleware'=>'api'
    ]
    , function () {
        Route::get('driver', 'ApiDriverController@index');
        Route::post('driver', 'ApiDriverController@store');
        Route::get('driver/{id}', 'ApiDriverController@show');
        Route::put('driver/{id}', 'ApiDriverController@update');
        Route::delete('driver/{id}', 'ApiDriverController@destroy');
 });
Route::group(
    [
      'middleware'=>'api'
    ]
    , function () {
        Route::get('driver_availability', 'ApiDriver_availabilityController@index');
        Route::post('driver_availability', 'ApiDriver_availabilityController@store');
        Route::get('driver_availability/{id}', 'ApiDriver_availabilityController@show');
        Route::put('driver_availability/{id}', 'ApiDriver_availabilityController@update');
        Route::delete('driver_availability/{id}', 'ApiDriver_availabilityController@destroy');
 });
Route::group(
    [
      'middleware'=>'api'
    ]
    , function () {
        Route::get('vehicle_assignment', 'ApiVehicle_assignmentController@index');
        Route::post('vehicle_assignment', 'ApiVehicle_assignmentController@store');
        Route::get('vehicle_assignment/{id}', 'ApiVehicle_assignmentController@show');
        Route::put('vehicle_assignment/{id}', 'ApiVehicle_assignmentController@update');
        Route::delete('vehicle_assignment/{id}', 'ApiVehicle_assignmentController@destroy');
 });
Route::group(
    [
      'middleware'=>'api'
    ]
    , function () {
        Route::get('document', 'ApiDocumentController@index');
        Route::post('document', 'ApiDocumentController@store');
        Route::get('document/{id}', 'ApiDocumentController@show');
        Route::put('document/{id}', 'ApiDocumentController@update');
        Route::delete('document/{id}', 'ApiDocumentController@destroy');
 });
Route::group(
    [
      'middleware'=>'api'
    ]
    , function () {
        Route::get('post_code', 'ApiPost_codeController@index');
        Route::post('post_code', 'ApiPost_codeController@store');
        Route::get('post_code/{id}', 'ApiPost_codeController@show');
        Route::put('post_code/{id}', 'ApiPost_codeController@update');
        Route::delete('post_code/{id}', 'ApiPost_codeController@destroy');
 });
Route::group(
    [
      'middleware'=>'api'
    ]
    , function () {
        Route::get('customer', 'ApiCustomerController@index');
        Route::post('customer', 'ApiCustomerController@store');
        Route::get('customer/{id}', 'ApiCustomerController@show');
        Route::put('customer/{id}', 'ApiCustomerController@update');
        Route::delete('customer/{id}', 'ApiCustomerController@destroy');
 });
Route::group(
    [
      'middleware'=>'api'
    ]
    , function () {
        Route::get('vehicle_type', 'ApiVehicleTypeController@index');
        Route::post('vehicle_type', 'ApiVehicleTypeController@store');
        Route::get('vehicle_type/{id}', 'ApiVehicleTypeController@show');
        Route::put('vehicle_type/{id}', 'ApiVehicleTypeController@update');
        Route::delete('vehicle_type/{id}', 'ApiVehicleTypeController@destroy');
 });
Route::group(
    [
      'middleware'=>'api'
    ]
    , function () {
        Route::get('policy', 'ApiPolicyController@index');
        Route::post('policy', 'ApiPolicyController@store');
        Route::get('policy/{id}', 'ApiPolicyController@show');
        Route::put('policy/{id}', 'ApiPolicyController@update');
        Route::delete('policy/{id}', 'ApiPolicyController@destroy');
 });
Route::group(
    [
      'middleware'=>'api'
    ]
    , function () {
        Route::get('gateway', 'ApiPaymentGatewayController@index');
        Route::post('gateway', 'ApiPaymentGatewayController@store');
        Route::get('gateway/{id}', 'ApiPaymentGatewayController@show');
        Route::put('gateway/{id}', 'ApiPaymentGatewayController@update');
        Route::delete('gateway/{id}', 'ApiPaymentGatewayController@destroy');
 });
Route::group(
    [
      'middleware'=>'api'
    ]
    , function () {
        Route::get('gateway', 'ApiCompanyInfoController@index');
        Route::post('gateway', 'ApiCompanyInfoController@store');
        Route::get('gateway/{id}', 'ApiCompanyInfoController@show');
        Route::put('gateway/{id}', 'ApiCompanyInfoController@update');
        Route::delete('gateway/{id}', 'ApiCompanyInfoController@destroy');
 });





 //  Route::group(
//     [
//       'namespace'=>'Auth',
//       'middleware'=>'api', 
//       'prefix' => 'auth', 
//       'as'=> 'user.auth.'
//     ]
//     , function () {
//      Route::post('register', 'AuthController@register');
//      Route::post('login', 'AuthController@login');
//      Route::post('logout', 'AuthController@logout');
//      Route::post('refresh', 'AuthController@refresh');
//      Route::post('me', 'AuthController@me');
//  });
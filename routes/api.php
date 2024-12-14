<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\AwardsController;
use App\Http\Controllers\api\CareerController;
use App\Http\Controllers\api\ContactController;
use App\Http\Controllers\api\ContractorRegistrationController;
use App\Http\Controllers\api\PostController;
use App\Http\Controllers\api\ProjectController;
use App\Http\Controllers\api\QuoteRequestController;
use App\Http\Controllers\api\ServiceCategoryController;
use App\Http\Controllers\api\ServiceController;
use App\Http\Controllers\api\SiteProfileController;
use App\Http\Controllers\api\SubscriberController;
use App\Http\Controllers\api\TeamsController;
use App\Http\Controllers\api\TestimonialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// 1. service api routes
Route::apiResource('services', ServiceController::class);
Route::apiResource('service-categories', ServiceCategoryController::class);

// 2. project api routes
Route::get('/projects',[ProjectController::class,'index']);
Route::get('/projects/slug/{slug}', [ProjectController::class, 'getProjectBySlug']);
Route::get('/projects/id/{id}', [ProjectController::class, 'getProjectById']);

// 3. blogs/post api routes
Route::get('/blogs',[PostController::class,'index']);
Route::get('/blogs/{id}',[PostController::class,'showById']);
Route::get('/blogs/{slug}',[PostController::class,'showBySlug']);

// 4. testimonials api route
Route::get('/testimonials',[TestimonialController::class,'index']);

// 5. quotes request api routes
Route::post('/quote-request',[QuoteRequestController::class,'submitQuoteRequest']);

// 6. contractors authentication api routes
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/user',[AuthController::class,'logged_user']);
    Route::post('/logout',[AuthController::class,'logout']);
;});

// newsletter subscribe
Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe');
Route::get('/verify/{token}', [SubscriberController::class, 'verifyEmail'])->name('verify.email');

// contact us api
Route::post('/create/contact', [ContactController::class, 'createContact'])->name('createContact');

// contractors room api
Route::post('/register/subcontractor', [ContractorRegistrationController::class, 'registerSubcontractor'])->name('registerSubcontractor');
Route::post('/proposal/submit', [ContractorRegistrationController::class, 'proposalSubmit'])->name('proposalSubmit');

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('get/register/contractor',[ContractorRegistrationController::class, 'getRegisterContractor']);
;});

// job listing api routes
Route::get('careers',[CareerController::class, 'allCareers']);
Route::get('careers/{id}',[CareerController::class,'GetById']);
Route::get('careers/slug/{slug}',[CareerController::class,'GetBySlug']);
Route::post('/apply-now',[CareerController::class,'applyJob'])
->name('apply.job');

// awards and certificates
Route::get('/awards',[AwardsController::class, 'allAwards']);

// teams api route
Route::get('/teams',[TeamsController::class,'getTeams']);

// site profile api route
Route::get('/site-profile',[SiteProfileController::class,'siteProfile']);
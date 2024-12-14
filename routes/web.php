<?php

use App\Http\Controllers\api\QuoteRequestController;
use App\Http\Controllers\dashboard\ApplicationController;
use App\Http\Controllers\dashboard\AwardsAndCertificationsController;
use App\Http\Controllers\dashboard\ContactController;
use App\Http\Controllers\dashboard\ContractorController;
use App\Http\Controllers\dashboard\JobListingController;
use App\Http\Controllers\dashboard\PostController;
use App\Http\Controllers\dashboard\ProfileController as DashboardProfileController;

use App\Http\Controllers\dashboard\ProjectController;
use App\Http\Controllers\dashboard\ProjectFileController;
use App\Http\Controllers\dashboard\QuotesController;
use App\Http\Controllers\dashboard\ResponseQuotesController;
use App\Http\Controllers\dashboard\ServiceController;
use App\Http\Controllers\dashboard\SubscriberController;
use App\Http\Controllers\dashboard\TeamController;
use App\Http\Controllers\dashboard\TestimonialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
// use Illuminate\Routing\Route;
// use Illuminate\Support\Facades\Route as FacadesRoute;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.welcome');
});

Route::get('/ssn-engineers', function(){
    return view('frontend.home.index');
})->name('engineer');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
// });

Route::get('/home', [UserController::class, 'index'])->middleware(['auth'])->name('dashboard');

// users route
Route::get('/users',[UserController::class,'users'])->name('users');

Route::get('/post', [UserController::class, 'post'])->middleware(['auth', 'role']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::resource('services', ServiceController::class);
Route::resource('projects', ProjectController::class);
Route::resource('posts', PostController::class);


Route::resource('jobs', JobListingController::class);

// job applications route
Route::get('jobs/{job}/applications', [ApplicationController::class, 'allApplications'])->name('jobs.application');
Route::resource('applications', ApplicationController::class);
Route::get('/job/applications',[ApplicationController::class,'showJobApplications'])->name('show.applications');
Route::get('/application/{id}/reply',[ApplicationController::class,'showReply'])->name('application.reply.show');
Route::post('/application/reply',[ApplicationController::class,'sendReply'])->name('application.reply.send');

// 1. dashboard quotes
Route::resource('quotes', QuotesController::class);
Route::get('quotes/{id}/prepare', [ResponseQuotesController::class, 'prepareQuote'])->name('quotes.prepare');
Route::post('quotes/response/send', [ResponseQuotesController::class, 'sendQuoteResponse'])->name('quote.response.send');


Route::resource('awards', AwardsAndCertificationsController::class);

// newsletter subscribers

// Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe');
Route::get('/verify/{token}', [SubscriberController::class, 'verifyEmail'])->name('verify.email');

Route::get('subscribers/index', [SubscriberController::class, 'index'])->name('subscribers');
Route::post('/admin/subscribers/send-email', [SubscriberController::class, 'sendEmail'])->name('admin.subscribers.sendEmail');

// teams
Route::resource('teams', TeamController::class);
Route::resource('testimonials', TestimonialController::class)->middleware('auth');

// contact us
Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');

// project open for subcontractors
Route::get('open/{id}/contractor', [ContractorController::class, 'show'])->name('contractor.show');
Route::post('subcontractor/files', [ProjectFileController::class, 'store'])->name('contractor.file.store');
// open status
Route::post('subcontractor/open/status',[ContractorController::class, 'openForContractor'])->name('open.forContractor');


// open project show routes
Route::get('/open_projects',[ProjectController::class,'openProjectShow'])->name('open.project');
Route::get('/open_projects/{id}/detail',[ProjectController::class,'viewOpenProject'])->name('view.openproject');

// contractors proposals
Route::get('contractors/proposal', [ContractorController::class, 'proposalIndex'])->name('contractors.proposal');
Route::get('contractors/{id}/proposal-review', [ContractorController::class, 'proposalReview'])->name('contractors.proposal.review');
Route::post('/update/bid/status',[ContractorController::class, 'updateBidStatus'])->name('update.bid.status');
Route::post('contractors/accept/bid',[ContractorController::class,'acceptBid'])->name('accept.bid');
Route::delete('/proposals/{id}/delete/',[ContractorController::class,'destroyProposal'])->name('delete.proposal');


// profile controller
Route::get('/site-profile',[DashboardProfileController::class,'showProfile'])->name('company.profile');
Route::put('/site-profile/update',[DashboardProfileController::class,'updateSiteProfile'])->name('update.site.profile');

// contacts route
Route::get('/contacts',[ContactController::class,'index'])->name('contact.show');
Route::get('/contact-reply/{id}',[ContactController::class,'replyShow'])->name('contact.reply.show');
Route::post('/reply/contact',[ContactController::class,'reply'])->name('contact.reply');
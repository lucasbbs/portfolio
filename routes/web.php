<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePassController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TestimonialController;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

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
    $brands = DB::table('brands')
        ->whereNull('deleted_at') // Exclude soft-deleted records
        ->get();
    $about = DB::table('home_abouts')->latest()->first();
    $images = DB::table('multipics')
        ->join('tags', 'multipics.tag_id', 'tags.id')
        ->select('multipics.*', 'tags.name as tag_name')
        ->get();
    $portfolios = DB::table('portfolios')
        ->join('tags', 'portfolios.tag_id', 'tags.id')
        ->select('portfolios.*', 'tags.name as tag_name')
        ->get();
    $tags = DB::table('tags')->get();
    $contact = DB::table('contacts')->first();
    $skills = DB::table('skills')->get();
    $resumeSummary = DB::table('resumes')->where('section', 'summary')->first();
    $resumeEducation = DB::table('resumes')->where('section', 'education')->get();
    $resumeExperience = DB::table('resumes')->where('section', 'professional_experience')->get();
    $services = Service::all();
    $testimonials = DB::table('testimonials')->get();
    return view('home', compact('testimonials','contact', 'brands', 'about', 'portfolios', 'tags', 'skills', 'resumeSummary', 'resumeEducation', 'resumeExperience', 'services'));
})->name('home');

Route::get('/about', function () {
    return view('about');
});
Route::get('/home', function () {
    echo "This is Home page";
    // return view('home');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // $users = App\Models\User::all();
        $users = DB::table('users')->get();
        return view('admin.index', compact('users'));
    })->name('dashboard');
});


// Category Controller

Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.categories');

Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');

Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);

Route::post('/category/update/{id}', [CategoryController::class, 'Update']);

Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);

Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);

Route::get('/pdelete/category/{id}', [CategoryController::class, 'Pdelete']);

// For Brand Route

Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brands');

Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');

Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);

Route::post('/brand/update/{id}', [BrandController::class, 'Update']);

Route::get('/brand/restore/{id}', [BrandController::class, 'Restore']);

Route::get('/softdelete/brand/{id}', [BrandController::class, 'SoftDelete']);

Route::get('/pdelete/brand/{id}', [BrandController::class, 'Pdelete']);


// Multi Image Route

Route::get('/multi/images', [BrandController::class, 'Multpic'])->name('multi.images');
Route::get('/multi/add', [BrandController::class, 'AddImg'])->name('add.multi');
Route::get('/multi/edit/{id}', [BrandController::class, 'EditImg']);
Route::get('/multi/{id}', [BrandController::class, 'Show'])->name('get.image');
Route::post('/multi/store', [BrandController::class, 'StoreImg'])->name('store.images');
Route::post('/multi/update/{id}', [BrandController::class, 'UpdateImg'])->name('update.images');
Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');
Route::get('/multi/delete/{id}', [BrandController::class, 'DeleteImg']);

// Slider Route

Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('all.sliders');
Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}', [HomeController::class, 'EditSlider']);
Route::post('/slider/update/{id}', [HomeController::class, 'UpdateSlider'])->name('update.slider');
Route::get('/slider/delete/{id}', [HomeController::class, 'DeleteSlider']);

// Home About All Route

Route::get('/home/about', [AboutController::class, 'HomeAbout'])->name('home.about');
Route::post('/store/about', [AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit', [AboutController::class, 'EditAbout'])->name('edit.about');
Route::post('/about/update/{id}', [AboutController::class, 'UpdateAbout'])->name('update.about');
Route::get('/about/delete/{id}', [AboutController::class, 'DeleteAbout']);

// Portfolio Page Route

Route::get('/portfolio/{id}', [AboutController::class, 'Portfolio'])->name('portfolio');

// Admin Contact Page Route

Route::get('/admin/contact', [ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/admin/add/contact', [ContactController::class, 'AdminAddContact'])->name('add.contact');
Route::post('/admin/store/contact', [ContactController::class, 'AdminStoreContact'])->name('admin.contact.store');
Route::get('/contact/edit/{id}', [ContactController::class, 'AdminEditContact']);
Route::post('/contact/update/{id}', [ContactController::class, 'AdminUpdateContact'])->name('admin.contact.update');
Route::get('/contact/delete/{id}', [ContactController::class, 'AdminDeleteContact']);
Route::get('/admin/message', [ContactController::class, 'AdminMessage'])->name('admin.message');
Route::get('/admin/message/delete/{id}', [ContactController::class, 'AdminDeleteMessage']);

// Home Contact Page Route

Route::get('/contact', [ContactFormController::class, 'Contact'])->name('contact');
Route::post('/contact/form', [ContactFormController::class, 'ContactForm'])->name('contact.form');

// Tag Route

Route::get('/home/tag', [HomeController::class, 'HomeTag'])->name('home.tags');
Route::get('/add/tag', [HomeController::class, 'AddTag'])->name('add.tag');
Route::post('/store/tag', [HomeController::class, 'StoreTag'])->name('store.tag');
Route::get('/tag/edit/{id}', [HomeController::class, 'EditTag']);
Route::post('/tag/update/{id}', [HomeController::class, 'UpdateTag'])->name('update.tag');
Route::get('/tag/delete/{id}', [HomeController::class, 'DeleteTag']);

// Change Password and User Profile Route

Route::get('/user/password', [ChangePassController::class, 'CPassword'])->name('change.password');
Route::post('/password/update', [ChangePassController::class, 'UpdatePassword'])->name('password.update');

// User Profile Route

Route::get('/user/profile', [ChangePassController::class, 'PUpdate'])->name('profile.update');
Route::post('/user/profile/update', [ChangePassController::class, 'UpdateProfile'])->name('update.user.profile');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');
    Route::get('/user/dashboard', [BrandController::class, 'UserDashboard'])->name('user.dashboard');
});

// Skill Routes
Route::get('/home/skill/', [SkillController::class, 'index'])->name('index.skill');
Route::get('/add/skill', [SkillController::class, 'create'])->name('add.skill');
Route::post('/store/skill', [SkillController::class, 'store'])->name('store.skill');
Route::get('skill/edit/{id}', [SkillController::class, 'edit']);
Route::post('/skill/update/{id}', [SkillController::class, 'update'])->name('update.skill');
Route::get('/skill/delete/{id}', [SkillController::class, 'destroy']);

// Resume Routes
Route::get('/home/resume/', [ResumeController::class, 'index'])->name('index.resume');
Route::get('/add/resume', [ResumeController::class, 'create'])->name('add.resume');
Route::post('/store/resume', [ResumeController::class, 'store'])->name('store.resume');
Route::get('resume/edit/{id}', [ResumeController::class, 'edit']);
Route::post('/resume/update/{id}', [ResumeController::class, 'update'])->name('update.resume');
Route::get('/resume/delete/{id}', [ResumeController::class, 'destroy']);

// Services Routes
Route::get('/home/service/', [ServiceController::class, 'index'])->name('index.service');
Route::get('/add/service', [ServiceController::class, 'create'])->name('add.service');
Route::post('/store/service', [ServiceController::class, 'store'])->name('store.service');
Route::get('service/edit/{id}', [ServiceController::class, 'edit']);
Route::post('/service/update/{id}', [ServiceController::class, 'update'])->name('update.service');
Route::get('/service/delete/{id}', [ServiceController::class, 'destroy']);

// Testimonials Routes
Route::get('/home/testimonial/', [TestimonialController::class, 'index'])->name('index.testimonial');
Route::get('/add/testimonial', [TestimonialController::class, 'create'])->name('add.testimonial');
Route::post('/store/testimonial', [TestimonialController::class, 'store'])->name('store.testimonial');
Route::get('testimonial/edit/{id}', [TestimonialController::class, 'edit']);
Route::post('/testimonial/update/{id}', [TestimonialController::class, 'update'])->name('update.testimonial');
Route::get('/testimonial/delete/{id}', [TestimonialController::class, 'destroy']);

// Portfolio Routes
Route::get('/home/portfolio/', [PortfolioController::class, 'index'])->name('index.portfolio');
Route::get('/add/portfolio', [PortfolioController::class, 'create'])->name('add.portfolio');
Route::get('/portfolio/slides/{id}', [PortfolioController::class, 'slides']);
Route::post('/store/portfolio', [PortfolioController::class, 'store'])->name('store.portfolio');
Route::get('portfolio/edit/{id}', [PortfolioController::class, 'edit']);
Route::post('/portfolio/update/{id}', [PortfolioController::class, 'update'])->name('update.portfolio');
Route::get('/portfolio/delete/{id}', [PortfolioController::class, 'destroy']);



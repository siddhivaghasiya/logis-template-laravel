  <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SocialmediaController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\QuoteController;
/*
|-------------------- ------------------------------------------------------
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('login', [Logincontroller::class, 'create'])->name('login');
Route::post('login/loginpost', [Logincontroller::class, 'postlogin'])->name('login.post');

//front
Route::get('about', [HomeController::class, 'about'])->name('aboutpage.index');

Route::get('service', [HomeController::class, 'service'])->name('servicepage.index');
Route::get('service/single/{slug}', [HomeController::class, 'servicesingle'])->name('service.single');

Route::get('pricing', [HomeController::class, 'pricing'])->name('pricingpage.index');

Route::get('contact', [HomeController::class, 'contact'])->name('contactpage.index');
Route::post('contact/store', [HomeController::class, 'contactstore'])->name('contact.store');

Route::get('quote', [HomeController::class, 'quote'])->name('quotepage.index');
Route::post('quote/store', [HomeController::class, 'quotestore'])->name('quote.store');




Route::group(['middleware' => 'checkUserIsLogin', 'prefix' => 'admin'], function () {

    Route::get('/', [Admincontroller::class, 'index'])->name('admin');

    Route::get('logout', [Logincontroller::class, 'logout'])->name('logout');

    Route::any('/save_tinymce_image', [Admincontroller::class, 'saveTinymceImage'])->name("save_tinymce_image");

    //about

    Route::get('about/get', [Aboutcontroller::class, 'anydata'])->name('about.anydata');
    Route::any('about/singleStatuschange', [Aboutcontroller::class, 'SingleStatusChange'])->name('about.Singlestatuschange');
    Route::get('about', [Aboutcontroller::class, 'index'])->name('about.index');
    Route::get('about/add', [Aboutcontroller::class, 'create'])->name('about.create');
    Route::Post('about/save', [Aboutcontroller::class, 'store'])->name('about.store');
    Route::get('about/{id}/edit', [Aboutcontroller::class, 'edit'])->name('about.edit');
    Route::post('about/{id}/saveupdate', [Aboutcontroller::class, 'update'])->name('about.update');
    Route::any('about/{id}/delete', [Aboutcontroller::class, 'delete'])->name('about.delete');

    //service

    Route::get('service', [ServiceController::class, 'index'])->name('service.index');
    Route::get('service/get', [ServiceController::class, 'anydata'])->name('service.anydata');
    Route::any('service/singleStatuschange', [ServiceController::class, 'SingleStatusChange'])->name('service.Singlestatuschange');
    Route::get('service/add', [ServiceController::class, 'create'])->name('service.create');
    Route::Post('service/save', [ServiceController::class, 'store'])->name('service.store');
    Route::get('service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::post('service/{id}/saveupdate', [ServiceController::class, 'update'])->name('service.update');
    Route::any('service/{id}/delete', [ServiceController::class, 'delete'])->name('service.delete');

    //Pricing

    Route::get('pricing', [PricingController::class, 'index'])->name('pricing.index');
    Route::get('pricing/get', [PricingController::class, 'anydata'])->name('pricing.anydata');
    Route::any('pricing/singleStatuschange', [PricingController::class, 'SingleStatusChange'])->name('pricing.Singlestatuschange');
    Route::get('pricing/add', [PricingController::class, 'create'])->name('pricing.create');
    Route::Post('pricing/save', [PricingController::class, 'store'])->name('pricing.store');
    Route::get('pricing/{id}/edit', [PricingController::class, 'edit'])->name('pricing.edit');
    Route::post('pricing/{id}/saveupdate', [PricingController::class, 'update'])->name('pricing.update');
    Route::any('pricing/{id}/delete', [PricingController::class, 'delete'])->name('pricing.delete');

    //SocialMedia

    Route::get('socialmedia', [SocialmediaController::class, 'index'])->name('socialmedia.index');
    Route::get('socialmedia/get', [SocialmediaController::class, 'anydata'])->name('socialmedia.anydata');
    Route::any('socialmedia/singleStatuschange', [SocialmediaController::class, 'SingleStatusChange'])->name('socialmedia.Singlestatuschange');
    Route::get('socialmedia/add', [SocialmediaController::class, 'create'])->name('socialmedia.create');
    Route::Post('socialmedia/save', [SocialmediaController::class, 'store'])->name('socialmedia.store');
    Route::get('socialmedia/{id}/edit', [SocialmediaController::class, 'edit'])->name('socialmedia.edit');
    Route::post('socialmedia/{id}/saveupdate', [SocialmediaController::class, 'update'])->name('socialmedia.update');
    Route::any('socialmedia/{id}/delete', [SocialmediaController::class, 'delete'])->name('socialmedia.delete');

    //testimonial

    Route::get('testimonial', [TestimonialController::class, 'index'])->name('testimonial.index');
    Route::get('testimonial/get', [TestimonialController::class, 'anydata'])->name('testimonial.anydata');
    Route::any('testimonial/singleStatuschange', [TestimonialController::class, 'SingleStatusChange'])->name('testimonial.Singlestatuschange');
    Route::get('testimonial/add', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::Post('testimonial/save', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('testimonial/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::post('testimonial/{id}/saveupdate', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::any('testimonial/{id}/delete', [TestimonialController::class, 'delete'])->name('testimonial.delete');

    //team

    Route::get('team', [TeamController::class, 'index'])->name('team.index');
    Route::get('team/get', [TeamController::class, 'anydata'])->name('team.anydata');
    Route::any('team/singleStatuschange', [TeamController::class, 'SingleStatusChange'])->name('team.Singlestatuschange');
    Route::get('team/add', [TeamController::class, 'create'])->name('team.create');
    Route::Post('team/save', [TeamController::class, 'store'])->name('team.store');
    Route::get('team/{id}/edit', [TeamController::class, 'edit'])->name('team.edit');
    Route::post('team/{id}/saveupdate', [TeamController::class, 'update'])->name('team.update');
    Route::any('team/{id}/delete', [TeamController::class, 'delete'])->name('team.delete');

    //cms

    Route::get('cms', [CmsController::class, 'index'])->name('cms.index');
    Route::get('cms/get', [CmsController::class, 'anydata'])->name('cms.anydata');
    Route::any('cms/singleStatuschange', [CmsController::class, 'SingleStatusChange'])->name('cms.Singlestatuschange');
    Route::get('cms/add', [CmsController::class, 'create'])->name('cms.create');
    Route::Post('cms/save', [CmsController::class, 'store'])->name('cms.store');
    Route::get('cms/{id}/edit', [CmsController::class, 'edit'])->name('cms.edit');
    Route::post('cms/{id}/saveupdate', [CmsController::class, 'update'])->name('cms.update');
    Route::any('cms/{id}/delete', [CmsController::class, 'delete'])->name('cms.delete');

    //faq

    Route::get('faq', [FaqController::class, 'index'])->name('faq.index');
    Route::get('faq/get', [FaqController::class, 'anydata'])->name('faq.anydata');
    Route::any('faq/singleStatuschange', [FaqController::class, 'SingleStatusChange'])->name('faq.Singlestatuschange');
    Route::get('faq/add', [FaqController::class, 'create'])->name('faq.create');
    Route::Post('faq/save', [FaqController::class, 'store'])->name('faq.store');
    Route::get('faq/{id}/edit', [FaqController::class, 'edit'])->name('faq.edit');
    Route::post('faq/{id}/saveupdate', [FaqController::class, 'update'])->name('faq.update');
    Route::any('faq/{id}/delete', [FaqController::class, 'delete'])->name('faq.delete');

    //content

    Route::get('content', [ContentController::class, 'index'])->name('content.index');
    Route::post('content/{id}/saveupdate', [ContentController::class, 'update'])->name('content.update');
    Route::post('content/delete', [ContentController::class, 'delete'])->name('delete.image');
    Route::post('content/delete_quote', [ContentController::class, 'delete_quote'])->name('delete.image_quote');

    //Setting

    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('setting/{id}/saveupdate', [SettingController::class, 'update'])->name('setting.update');

    //contact

    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::get('contact/get', [ContactController::class, 'anydata'])->name('contact.anydata');
    Route::any('contact/{id}/delete', [ContactController::class, 'delete'])->name('contact.delete');
    Route::any('contact/{id}/view', [ContactController::class, 'view'])->name('contact.view');

    //quote

    Route::get('quote', [QuoteController::class, 'index'])->name('quote.index');
    Route::get('quote/get', [QuoteController::class, 'anydata'])->name('quote.anydata');
    Route::any('quote/{id}/delete', [QuoteController::class, 'delete'])->name('quote.delete');
    Route::any('quote/{id}/view', [QuoteController::class, 'view'])->name('quote.view');
});



Route::get('/{slug}', [CmsController::class, 'detail'])->name('cms.details');

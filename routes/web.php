<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\HomeController;



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

route::get('/',[AdminController::class,'home']);




route::get('/home',[AdminController::class,'index'])->name('home');


route::get('/create_room',[AdminController::class,'create_room'])
->middleware(['auth','admin']);

route::post('/add_room',[AdminController::class,'add_room'])
->middleware(['auth','admin']);

route::get('/viwe_room',[AdminController::class,'viwe_room'])
->middleware(['auth','admin']);

route::get('/room_delete/{id}',[AdminController::class,'room_delete'])
->middleware(['auth','admin']);

route::get('/room_update/{id}',[AdminController::class,'room_update'])
->middleware(['auth','admin']);

route::post('/edit_room/{id}',[AdminController::class,'edit_room'])
->middleware(['auth','admin']);

route::get('/room_details/{id}',[HomeController::class,'room_details']);

route::post('/add_booking/{id}',[HomeController::class,'add_booking']);

route::get('/bookings',[AdminController::class,'bookings'])

->middleware(['auth','admin']);


// لتحقق ازا عامل لوق ان


Route::post('/booking/{id}', [HomeController::class, 'add_booking'])
    ->middleware('auth'); // هذا يضمن إن المستخدم عامل تسجيل دخول


route::get('/delete_booking/{id}',[AdminController::class,'delete_booking'])
->middleware(['auth','admin']);

route::get('/approve_book/{id}',[AdminController::class,'approve_book'])
->middleware(['auth','admin']);

route::get('/reject_book/{id}',[AdminController::class,'reject_book'])
->middleware(['auth','admin']);

route::get('/viwe_gallary',[AdminController::class,'viwe_gallary'])
->middleware(['auth','admin']);

route::post('/upload_gallary',[AdminController::class,'upload_gallary'])
->middleware(['auth','admin']);

route::get('/delete_gallary/{id}',[AdminController::class,'delete_gallary'])
->middleware(['auth','admin']);

route::post('/contact',[HomeController::class,'contact']);

route::get('/all_messages',[AdminController::class,'all_messages'])
->middleware(['auth','admin']);

route::get('/send_mail/{id}',[AdminController::class,'send_mail'])
->middleware(['auth','admin']);

route::post('/mail/{id}',[AdminController::class,'mail'])
->middleware(['auth','admin']);

route::get('/our_rooms',[HomeController::class,'our_rooms']);

route::get('/hotel_gallary',[HomeController::class,'hotel_gallary']);

route::get('/contact_us',[HomeController::class,'contact_us']);


route::get('/new_users',action: [AdminController::class,'new_users'])
->middleware(['auth','admin']);







// للبروفايل

Route::get('/profile', [HomeController::class, 'profile'])->middleware('auth')->name('profile');

Route::get('/my-profile', [HomeController::class, 'profile'])->name('profile');



Route::middleware('auth')->group(function () {
    // مسار لعرض صفحة البروفايل (GET)
    Route::get('/my-profile', [HomeController::class, 'show'])->name('profile');
    
    // مسار لتحديث البيانات (PUT)
    Route::put('/my-profile', [HomeController::class, 'update'])->name('profile.update');
});


// صورة

Route::put('/profile/image', [HomeController::class, 'updateImage'])->name('profile.update.image');



// رول

Route::post('/change-usertype/{id}', [AdminController::class, 'changeUsertype']);


// لحذف اليوزر 


Route::delete('delete-user/{id}', [AdminController::class, 'deleteUser']);


// لتعديل بيانات اليوزر 

// عرض نموذج التعديل
Route::get('/edit-user/{id}', [AdminController::class, 'edit'])->name('user.edit');

// معالجة التعديل
Route::put('/update-user/{id}', [AdminController::class, 'update'])->name('user.update');


// سيرش


Route::get('show_rooms', [AdminController::class, 'showRooms']); 
Route::get('show_booking', [AdminController::class, 'show_booking']); 
Route::get('show_messages', [AdminController::class, 'show_messages']); 

Route::get('/search-user', [AdminController::class, 'searchUser']);

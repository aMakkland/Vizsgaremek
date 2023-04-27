<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','role:admin'])->group(function() {
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/admin/dashboard','Index')->name('admin_dashboard');          
    });

    Route::controller(CategoryController::class)->group(function(){
        Route::get('/admin/all_category','Index')->name('all_category');          
        Route::get('/admin/add_category','Add_Category')->name('add_category');
        Route::post('/admin/store_category','Store_Category')->name('store_category');  
        Route ::get('/admin/edit_category/{id}','Edit_Category')->name('edit_category'); 
        Route::post('/admin/update_category','Update_Category')->name('update_category');
        Route ::get('/admin/delete_category/{id}','Delete_Category')->name('delete_category');     
    });  

    Route::controller(SubCategoryController::class)->group(function(){
        Route::get('/admin/all_subcategory','Index')->name('all_subcategory');          
        Route::get('/admin/add_subcategory','Add_SubCategory')->name('add_subcategory');
        Route::post('/admin/store_subcategory','Store_SubCategory')->name('store_subcategory'); 
        Route::get('/admin/edit_subcategory/{id}', 'Edit_SubCategory')->name('edit_subcategory');         
        Route::get('/admin/delete_subcategory/{id}', 'Delete_SubCategory')->name('delete_subcategory');
        Route::post('/admin/update_subcategory', 'Update_SubCategory')->name('update_subcategory');
         
    }); 

    Route::controller(ProductController::class)->group(function(){
        Route::get('/admin/all_products','Index')->name('all_products');          
        Route::get('/admin/add_product','Add_Product')->name('add_product'); 
        Route::post('/admin/store_product','Store_Product')->name('store_product'); 
        Route::get('/admin/edit_product_img/{id}','Edit_Product_Img')->name('edit_product_img'); 
        Route::post('/admin/update_product_img','Update_Product_Img')->name('update_product_img');      
    });  

    Route::controller(OrderController::class)->group(function(){
        Route::get('/admin/pending_order','Index')->name('pending_order');          
               
    });  
});


require __DIR__.'/auth.php';

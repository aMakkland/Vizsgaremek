<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Végpontok
|--------------------------------------------------------------------------
|
|
*/

Route::controller(HomeController::class)->group(function() 
{
    Route::get('/','Index')->name('Home');
});

Route::controller(ClientController::class)->group(function() 
{
    Route::get('/category/{id}/{slug}','Category_Page')->name('category');
    Route::get('/product_details/{id}/{slug}','Single_Product')->name('single_product');
    Route::get('/new_relese','New_Relese')->name('new_relese');
});
/******Felhasználói endpointok *********/
Route::middleware(['auth', 'role:user'])->group(function()
{
    Route::controller(ClientController::class)->group(function() 
    {
        Route::get('/add_to_cart','Add_To_Cart')->name('add_to_cart');
        Route::post('/add_product_to_cart','Add_To_Product_Cart')->name('add_to_product_cart');
        Route::get('/checkout','Checkout')->name('checkout');
        Route::get('/shippinng_address','Shipping_Adress')->name('shipping_address');
        Route::post('/add_shipping_address','Add_Shipping_Address')->name('add_shipping_address');
        Route::post('/place_order','Place_Order')->name('palce_order');
        Route::get('/user_profile','User_Profile')->name('user_profile');
        Route::get('/user_profile/pending_orders','Pending_Orders')->name('pending_orders');
        Route::get('/user_profile/history','History')->name('history');
        Route::get('/new_relese','New_Relese')->name('new_relese');
        Route::get('/todays_deal','Todays_Deal')->name('todays_deal');
        Route::get('/custom_service','Customer_Service')->name('custom_service');
        Route::get('/remove_cart_item{id}','Remove_Cart_Item')->name('remove_cart_item');
    });
});
Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
/******Admin endpointok *********/
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
        Route::get('/admin/edit_product/{id}','Edit_Product')->name('edit_product');
        Route::post('/admin/update_product', 'Update_Product')->name('update_product');
        Route::get('/admin/delete_product/{id}', 'Delete_Product')->name('delete_product');     
    });  

    Route::controller(OrderController::class)->group(function(){
        Route::get('/admin/pending_order','Index')->name('pending_order');          
               
    });  
});


require __DIR__.'/auth.php';

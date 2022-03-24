<?php

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

Route::group(['middleware' => ['web']], function () {

    // Route::group(['middleware' => ['auth']], function () {

    // });

    /////////////////////////////// DANG KY - DANG NHAP
    Route::get('login', [
        'as' => 'login',
        'uses' => 'App\Http\Controllers\PageController@getLogin'
    ]);

    Route::post('login', [
        'as' => 'login',
        'uses' => 'App\Http\Controllers\PageController@postLogin'
    ]);

    Route::get('logout', [
        'as' => 'dang-xuat',
        'uses' => 'App\Http\Controllers\PageController@postLogout'
    ]);

    Route::get('register', [
        'as' => 'dang-ky',
        'uses' => 'App\Http\Controllers\PageController@getRegister'
    ]);
    Route::post('register', [
        'as' => 'dang-ky',
        'uses' => 'App\Http\Controllers\PageController@postRegister'
    ]);

    Route::get('user_detail', [
        'as' => 'thong-tin-user',
        'uses' => 'App\Http\Controllers\PageController@getuser_detail'
    ]);
    Route::get('user_edit', [
        'as' => 'chinh-sua-user',
        'uses' => 'App\Http\Controllers\PageController@getuser_edit'
    ]);
    Route::post('user_edit', [
        'as' => 'chinh-sua-user',
        'uses' => 'App\Http\Controllers\PageController@postuser_edit'
    ]);

    Route::get('password_edit', [
        'as' => 'doi-mat-khau',
        'uses' => 'App\Http\Controllers\PageController@getpassword_edit'
    ]);
    Route::post('password_edit', [
        'as' => 'doi-mat-khau',
        'uses' => 'App\Http\Controllers\PageController@postpassword_edit'
    ]);

    Route::post('delete', [
        'as' => 'xoa-user',
        'uses' => 'App\Http\Controllers\PageController@delete'
    ]);
    Route::post('role_change', [
        'as' => 'role-change',
        'uses' => 'App\Http\Controllers\PageController@role_change'
    ]);
    /////////////////////////////////// END DANG KY - DANG NHAP

    Route::get('index', [
        'as' => 'index',
        'uses' => 'App\Http\Controllers\PageController@getIndex'
    ]);

    Route::get('/', function () {
        return view('userpage.home');
    });



    // Route::get('/', function () {
    //     return view('welcome');
    // });

    ////////////////////////////USER PAGE///////////////////
    //cach1
    // Route::get('index', [
    //     'as' => 'index',
    //     'uses' => 'App\Http\Controllers\PageController@getIndex'
    // ]);
    //cach2 con sai, chua fix
    // Route::get('/unicode', function () {
    //     return view('master');
    // });


    // Route::get('/san-pham', function(){
    //     return view('test');
    // });


    //PRODUCT & CART
    Route::get('category', [
        'as' => 'danh-muc',
        'uses' => 'App\Http\Controllers\ProductController@getProduct_Category'
    ]);

    Route::get('product-detail/{id}', [
        'as' => 'sp-chitiet',
        'uses' => 'App\Http\Controllers\ProductController@getProductDetail'
    ]);

    Route::get('showProduct{id}', 'App\Http\Controllers\ProductController@showProduct');

    Route::get('cart', [
        'as' => 'gio-hang',
        'uses' => 'App\Http\Controllers\CartController@getCart'
    ]);

    Route::get(
        'checkout',
        function () {
            return view("userpage.checkout");
        }
    );

    Route::post('add2Cart{id}', 'App\Http\Controllers\CartController@add2Cart');

    Route::post('delFromCart{id}', 'App\Http\Controllers\CartController@delFromCart');

    Route::post('quantityProduct{id}', 'App\Http\Controllers\CartController@quantityProduct');

    Route::post('delQty', 'App\Http\Controllers\CartController@delQty');

    //Route::post('addQty', 'App\Http\Controllers\CartController@addQty');

    Route::post('delCart', 'App\Http\Controllers\CartController@delCart');

    Route::get('checkout', 'App\Http\Controllers\CartController@checkout');

    Route::post('order', 'App\Http\Controllers\CartController@order');
    //END PRODUCT & CART

    Route::get('blog-detail/{id_blog}', [
        'as' => 'bv-chitiet',
        'uses' => 'App\Http\Controllers\PageController@getBlogDetail'
    ]);

    Route::get('blog', [
        'as' => 'bai-viet',
        'uses' => 'App\Http\Controllers\PageController@getBlog'
    ]);

    Route::get('contact', [
        'as' => 'lienhe',
        'uses' => 'App\Http\Controllers\PageController@getContact'
    ]);

    Route::get('search', [
        'as' => 'tim-kiem',
        'uses' => 'App\Http\Controllers\PageController@getSearch'
    ]);

    ////////////////////////////ADMIN PAGE///////////////////

    Route::get('ad_index', [
        'as' => 'ad-trang-chu',
        'uses' => 'App\Http\Controllers\PageController@getad_Index'
    ]);
    Route::get('ad_listproduct', [
        'as' => 'ad-san-pham',
        'uses' => 'App\Http\Controllers\PageController@getad_ListProduct'
    ]);
    Route::get('ad_listblog', [
        'as' => 'ad-bai-viet',
        'uses' => 'App\Http\Controllers\PageController@getad_ListBlog'
    ]);
    Route::get('ad_listorder', [
        'as' => 'ad-don-hang',
        'uses' => 'App\Http\Controllers\PageController@getad_ListOrder'
    ]);

    /********************** */
    Route::post('ad_listorderdetail', [
        'as' => 'ad-don-hang-ct',
        'uses' => 'App\Http\Controllers\PageController@getad_ListOrderDetail'
    ]);

    /********************** */
    Route::get('ad_listuser', [
        'as' => 'ad-nguoi-dung',
        'uses' => 'App\Http\Controllers\PageController@getad_ListUser'
    ]);
});



// ------------------------------
Route::get('ad_editblog',[
    'as'=>'ad-sua-bai-viet',
    'uses'=>'App\Http\Controllers\PageController@getad_EditBlog'
]);

Route::post('view_ad_EditBlog',[
    'as'=>'ad-tro-trang-edit-blog',
    'uses'=>'App\Http\Controllers\PageController@view_ad_EditBlog'
]);

Route::post('ad_editblog',[
    'as'=>'ad-chuc-nang-edit-bai-viet',
    'uses'=>'App\Http\Controllers\PageController@postad_EditBlog'
]);
// chưc năng sủa blogs 


// ------------------------------------
// chức năng xóa bài viết 
Route::post('ad_deleteblog',[
    'as'=>'ad-chuc-nang-xoa-bai-viet',
    'uses'=>'App\Http\Controllers\PageController@DeleteBlog'
]);

// trang thêm 
Route::get('ad_addblog',[
    'as'=>'ad-them-bai-viet',
    'uses'=>'App\Http\Controllers\PageController@getad_AddBlog'
]);

Route::post('ad_addblog',[
    'as'=>'ad-them-bai-viet',
    'uses'=>'App\Http\Controllers\PageController@postad_AddBlog'
]);


/////////Product////////
Route::get('ad_editproduct',[
    'as'=>'ad-sua-san-pham',
    'uses'=>'App\Http\Controllers\PageController@getad_EditProduct'
]);

Route::post('view_ad_EditProduct',[
    'as'=>'ad-edit-product',
    'uses'=>'App\Http\Controllers\PageController@view_ad_EditProduct'
]);

Route::post('ad_editproduct',[
    'as'=>'ad-chuc-nang-edit-san-pham',
    'uses'=>'App\Http\Controllers\PageController@postad_EditProduct'
]);

Route::post('ad_deleteproduct',[
    'as'=>'ad-chuc-nang-xoa-san-pham',
    'uses'=>'App\Http\Controllers\PageController@DeleteProduct'
]);
Route::get('ad_addproduct',[
    'as'=>'ad-them-san-pham',
    'uses'=>'App\Http\Controllers\PageController@getad_AddProduct'
]);

Route::post('ad_addproduct',[
    'as'=>'ad-them-san-pham',
    'uses'=>'App\Http\Controllers\PageController@postad_AddProduct'
]);
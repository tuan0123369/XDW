<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog as ModelsBlog;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class PageController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    ///////////////////////////USER PAGE//////////////////////////
    public function getIndex()
    {
        return view('userpage.home');
    }

    public function getCart()
    {
        return view('userpage.shop_shoppingcart');
    }

    public function getBlog()
    {
        $new_blogs = ModelsBlog::where('id_categories', 1)->paginate(5);
        //dd($new_blogs);
        return view('userpage.blog_blog', compact('new_blogs'));
    }

    public function getBlogDetail(Request $req)
    {
        $ctbaiviet = ModelsBlog::where('id_blog', $req->id_blog)->first();

        return view('userpage.blog_blogdetail', compact('ctbaiviet'));

        // return view('userpage.blog_blogdetail');
    }

    public function getContact()
    {
        return view('userpage.contact');
    }

    public function getSearch(Request $req)
    {
        $name = ModelsBlog::where('name_blog', '%' . 'like', $req->key . '%')->get();
        return view('userpage.search', compact($name));
    }

    /////////////////////////////////////////////////// DANG KY - DANG NHAP
    public function getRegister()
    {
        return view('userpage.pages_register');
    }

    public function postRegister(Request $req)
    {
        $this->validate(
            $req,
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'user_name' => 'required',
                'address' => 'required',
                'phone' => 'required',
                're_password' => 'required|same:password'
            ],
            [
                'email.required' => 'Please type your email !',
                'address.required' => 'Please type your address !',
                'phone.required' => 'Please type your phone number !',
                'email.email' => 'Incorrect email format !',
                'email.unique' => 'Email already in use !',
                'password.required' => 'Please type your password !',
                're_password.same' => 'Re Password not match !'
            ]
        );

        DB::table('users')->insert(
            [
                'user_name' =>  $req->user_name,
                'address' =>  $req->address,
                'phone' =>  $req->phone,
                'email' =>  $req->email,
                'password' =>  Hash::make($req->password),
                'avatar' =>  'UNDONE',
                'role' =>  0,
            ]
        );

        return redirect()->back()->with('register_status', 'Register Success');
    }

    public function getLogin()
    {
        return view('userpage.pages_login');
    }

    public function postLogin(Request $req)
    {
        $this->validate(
            $req,
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => 'Please type your email !',
                'email.email' => 'Incorrect email format !',
                'password.required' => 'Please type your password !',
            ]
        );

        $credentials = array(
            'email' => $req->email,
            'password' => $req->password
        );
        if (Auth::attempt($credentials)) {

            Session::put('logged', true);
            Session::put('user_id', Auth::user()->id_user);
            Session::put('user_email', Auth::user()->email);
            Session::put('user_name', Auth::user()->user_name);
            Session::put('user_address', Auth::user()->address);
            Session::put('user_phone', Auth::user()->phone);
            Session::put('user_avatar', Auth::user()->avatar);
            Session::put('user_role', Auth::user()->role);

            //Get Cart Item
            $id_user = Session('user_id');
            Session('cartItem', []);
            Session::put('cartItem', Cart::countCart($id_user));
            //End get Cart item

            //Session::save();

            //Get Cart Item
            $id_user = Session('user_id');
            Session('cartItem', []);
            Session::put('cartItem', Cart::countCart($id_user));
            //End get Cart item

            //if ((Auth::user()->role) == 1)
            return view('userpage.home');
            //else
            //    return view('userpage.home');
        } else {
            return redirect()->back()->with('login_status', 'Wrong email or password !');
        }
    }

    public function postLogout()
    {
        Session::put('logged', false);
        Auth::logout();
        return view('userpage.home');
    }
    /////////////////////////////////////////////////////////////// END DANG KY - DANG NHAP

    public function getuser_detail()
    {
        return view('adminpage.user_detail');
    }

    public function getuser_edit()
    {
        return view('adminpage.user_edit');
    }
    public function postuser_edit(Request $req)
    {
        if ($req->img != null) {
            DB::table('users')->where('id_user', Session::get('user_id'))->update(
                [
                    'user_name' =>  $req->user_name,
                    'address' =>  $req->address,
                    'phone' =>  $req->phone,
                    'avatar' => $req->img
                ]
            );
            Session::put('user_name', $req->user_name);
            Session::put('user_address', $req->address);
            Session::put('user_phone', $req->phone);
            Session::put('user_avatar', $req->img);

            // $avatar = DB::table('users')->where('id_user', Session::get('user_id'))->get('avatar');

            return view('adminpage.user_detail');
        } else {
            DB::table('users')->where('id_user', Session::get('user_id'))->update(
                [
                    'user_name' =>  $req->user_name,
                    'address' =>  $req->address,
                    'phone' =>  $req->phone,
                ]
            );
            Session::put('user_name', $req->user_name);
            Session::put('user_address', $req->address);
            Session::put('user_phone', $req->phone);

            return view('adminpage.user_detail');
        }
    }

    public function getpassword_edit()
    {
        return view('adminpage.password_edit');
    }
    public function postpassword_edit(Request $req)
    {
        $this->validate(
            $req,
            [
                'old_pwd' => 'required',
                'new_pwd' => 'required',
                're_pwd' => 'required|same:new_pwd'
            ],
            [
                'old_pwd.required' => 'Please type your old password !',
                'new_pwd.required' => 'Please type your new password !',
                're_pwd.required' => 'Please confirm your new password !',

                're_pwd.same' => 'Re Password not match !'
            ]
        );

        //$old_pwd = DB::select('select password from users where id_user = "' . Session::get('user_id') . '" ');
        //if(Hash::check($req->old_pwd, $old_pwd) ){

        // LUON LUON SAI VI PLAN TEXT != CHUOI HASH
        // if ($req->old_pwd == $old_pwd) { 
        // } else {
        //     return redirect()->back()->with('change_pwd_error', 'Recent Password Not Match');
        // }
        DB::table('users')->where('id_user', Session::get('user_id'))->update(
            [
                'password' =>  Hash::make($req->new_pwd)
            ]
        );

        return view('adminpage.user_edit')->with('change_pwd_status', 'Change Success');
    }

    public function delete(Request $req)
    {
        DB::table('users')->where('id_user', $req->id)->delete();
        return redirect()->back()->with('xoathanhcong', 'Data Deleted');
    }

    public function role_change(Request $req)
    {
        if (($req->role) == 1) {
            DB::table('users')->where('id_user', $req->id)->update(
                ['role' => 0]
            );
            return redirect()->back();
        } else {
            DB::table('users')->where('id_user', $req->id)->update(
                ['role' => 1]
            );
            return redirect()->back();
        }
    }

    /////////////////////////// ADMIN PAGE //////////////////////////

    public function getad_Index()
    {
        return view('adminpage.ad_home');
    }
    public function getad_ListProduct(){
        $query = DB::table("products");
        $query = $query->orderBy("id_product","Desc");
        $query = $query->select("*");
        $data= $query->paginate(15) ; 
        
        return view('adminpage.ad_listproduct',$data);
    }
    
    // public function getad_ListBlog()
    // {
    //     return view('adminpage.ad_listblog');
    // }

    /////************ */
    public function getad_ListOrder()
    {
        $new_order = Order::all();
        //dd($new_order);
        return view('adminpage.ad_listorder', compact('new_order'));
    }
    /****************** */
    /****************** */
    public function getad_ListOrderDetail(Request $req)
    {

        $ctdonhang = DB::table('order_details')->where('id_order', $req->id_order)->get();

        $user1 = $req->id_user;

        $kh = User::where('id_user', 1);
        //dd($kh);
        //id_order là name trong thẻ input bên vỉew
        //>where('tên column trong table',$req->name trong thẻ input view)
        //dd($ctdonhang);

        return view('adminpage.ad_listorderdetail', compact('ctdonhang', 'user1', 'kh'));
    }
    /****************** */

    public function getad_ListUser()
    {
        $users = DB::select('select * from users');
        return view('adminpage.ad_listuser', ['users' => $users]);
    }


    // Blog 
    // hiển thị danh sách bài viết 
public function getad_ListBlog(){
    $query = DB::table("blogs");
    $query = $query->orderBy("id_blog","Desc");
    $query = $query->select("*");
    $data= $query->paginate(15) ; 
    
    return view('adminpage.ad_listblog',$data);
}
//lấy thể loại 
public function getad_CateBlog(){
    
    $query = DB::table("categories");
    $query = $query->orderBy("id_categories","Desc");
    $query = $query->select("*");
    $data= $query->paginate(15) ; 
    
    return view('adminpage.ad_listblog',$data);
}

// trỏ trang thêm 
public function getad_AddBlog(){
    $query = DB::table("categories");
    $query = $query->orderBy("id_categories","Desc");
    $query = $query->select("*");
    $data= $query->paginate(15) ; 
    return view('adminpage.ad_addblog',$data);
}

// chức năng thêm 
public function postad_AddBlog(Request $req){
    $this->validate(
        $req,
        [
            'name_blog' => 'required',
            'description' => 'required',
            'image' => 'required',
        ],
        [
            'name_blog.required' => 'Please type your titile blogs !',
            'description.required' => 'Please type your contnet !',
            'image.required' => 'Please input images',
        ]
    );
    DB::table('blogs')->insert(
        [
            'id_categories' =>  $req->id_categories,
            'name_blog' =>  $req->name_blog,
            'description' =>  $req->description,
            'image' =>  $req->image,
        ]
    );

    return redirect()->back()->with('blogs_status', 'blogs Success');
}

//trỏ trang sửa 
//trang sưa blogs
public function getad_EditBlog(){

return view('adminpage.ad_editblog' );
}

public function view_ad_EditBlog(Request $req){
    $query = DB::table("categories");
    $query = $query->orderBy("id_categories","Desc");
    $query = $query->select("*");
    $data= $query->paginate(15) ; 
    
    Session::put('id_blog',$req->id_blog);
    Session::put('name_blog',$req->name_blog);
    Session::put('description',$req->description);

    return view('adminpage.ad_editblog',$data);
}

// chức năng sủa blog 
public function postad_EditBlog(Request $req)
    {
        if($req->image!=null){
            DB::table('blogs')->where('id_blog',Session::get('id_blog'))->update(
                [
                    'name_blog' =>  $req->name_blog,
                    'description' =>  $req->description,
                    'image' =>  $req->image,
                ]);
                return view('adminpage.ad_home');
        }else{
            DB::table('blogs')->where('id_blog',$req->id_blog)->update(
            [
                'name_blog' =>  $req->name_blog,
                'description' =>  $req->description,
                
            ]);
            return view('adminpage.ad_home');
        }
    }

// chức năng xóa 
public function DeleteBlog(Request $req){
    DB::table('blogs')->where('id_blog', $req->blog_delete)->delete();
    return redirect()->back()->with('xoathanhcong','Data Deleted');
}



////////////Product/////////////

public function getad_EditProduct(){
         return view( 'adminpage.ad_editProduct');
    }

    public function view_ad_EditProduct(Request $req){
        $query = DB::table("categories");
        $query = $query->orderBy("id_categories","Desc");
        $query = $query->select("*");
        $data= $query->paginate(15) ; 
        
        Session::put('id_product',$req->id_product);
        Session::put('product_name',$req->product_name);
        Session::put('description',$req->description);
    
        return view('adminpage.ad_editproduct',$data);
    }

    public function postad_EditProduct(Request $req)
{

    if($req->image!=null){
        DB::table('products')->where('id_product',Session::get('id_product'))->update(
            [
                'product_name' =>  $req->product_name,
                'description' =>  $req->description,
                'price' => $req->price,
                'status' => $req->status,
                'image' =>  $req->image
            ]);
            return view('adminpage.ad_home');
    }else{
        DB::table('products')->where('id_product',Session::get('id_product'))->update(
        [
            'product_name' =>  $req->product_name,
            'description' =>  $req->description,
            'status' => $req->status,
            'price' => $req->price,
            'image' =>  $req->image
            
        ]);
        return view('adminpage.ad_home');
    }
}

public function DeleteProduct(Request $req){
    DB::table('products')->where('id_product', $req-> product_delete )->delete();
    return redirect()->back()->with('xoathanhcong','Data Deleted');
}

public function getad_AddProduct(){
    $query = DB::table("categories");
    $query = $query->orderBy("id_categories","Desc");
    $query = $query->select("*");
    $data= $query->paginate(15) ; 
    return view('adminpage.ad_addproduct',$data);
}

public function postad_AddProduct(Request $req){
    $this->validate(
        $req,
        [
            'id_categories' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
            'remaining' => 'required',
            'status' => 'required',
            
        ],
        [
            'id_categories.required' => 'Please type your titile categories !',
            'product_name.required' => 'Please type your name !',
            'description.required' => 'Please input conntent',
            'image.required' => 'Please type your image !',
            'price.required' => 'Please type your pricet !',
            'remaining.required' => 'Please type your remaining !',
            'status.required' => 'Please type your status !',
            
        ]
    );
    DB::table('products')->insert(
        [
            'id_categories' =>  $req->id_categories,
            'product_name' =>  $req->product_name,
            'description' =>  $req->description,
            'image' =>  $req->image,
            'price' =>  $req->price,
            'remaining' =>  $req->remaining,
            'status' =>  $req->status,
        ]
    );
    return redirect()->back()->with('product_status', 'product Success');
}

public function getad_CateProduct(){
        
    $query = DB::table("categories");
    $query = $query->orderBy("id_categories","Desc");
    $query = $query->select("*");
    $data= $query->paginate(15) ; 
    
    return view('adminpage.ad_listproduct',$data);
}

}
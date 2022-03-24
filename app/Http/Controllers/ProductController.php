<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Routing\Route;
use PhpParser\Node\Expr\Cast\Array_;
use PhpParser\Node\Expr\FuncCall;
use PHPUnit\Util\Json;

class ProductController extends Controller
{
    public function getProduct_Category()
    {
        $categories = Category::all()->where('status', 1);
        $products = Product::paginate(6);
        return view('userpage.shop_category', compact('categories', 'products'));
    }

    public function getProduct_Category_Single(Request $request)
    {
        $categories = Category::all()->where('status', 1);
        $products = Product::where('id_categories', $request)->paginate(6);
        return view('userpage.shop_category', compact('categories', 'products'));
    }

    public function getProductDetail(Request $request)
    {
        $product = Product::where('id_product', $request->id)->first();
        return view('userpage.shop_productdetail', compact('product'));
    }

    public function showProduct(Request $request)
    {
        $products = Product::where('id_categories', $request->id)->paginate(6);
        return response()->json([
            'html' => view('userpage.shop_product', compact('products'))->render(),
        ], 200);
    }
}

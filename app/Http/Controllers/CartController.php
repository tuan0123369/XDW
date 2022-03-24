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
use App\Models\Order;
use App\Models\User;
use Illuminate\Routing\Route;
use PhpParser\Node\Expr\Cast\Array_;
use PhpParser\Node\Expr\FuncCall;
use PHPUnit\Util\Json;

class CartController extends Controller
{
    public function getCart()
    {
        if (Session::has('logged') && Session('logged', true)) {
            $user_id = Session('user_id');
            $cart = new Cart();
            $products = $cart->getCart($user_id);
            return view('userpage.shop_shoppingcart', compact('products'));
        }

        $cartItem = Session('cartItem');
        if ($cartItem != null) {
            foreach ($cartItem as $item) {
                $products[] = json_decode(Product::where('id_product', $item)->first());
            }
        } else {
            $products = '';
        }
        return view('userpage.shop_shoppingcart', compact('products'));
    }

    public function add2Cart(Request $request)
    {
        if (Session::has('logged') && Session('logged', true)) {
            $cart = new Cart();
            $user_id = Session('user_id');
            $cart->add2Cart($user_id, $request->id);
            $cartList =  $cart->countCart($user_id);
            Session::put(['cartItem' => $cartList]);
            return response()->json(array('item' => count($cartList)), 200);
        }

        $item = Session('cartItem', []);
        array_push($item, $request->id);
        $cartList = array_unique($item);
        Session::put(['cartItem' => $cartList]);
        return response()->json(array('item' => count($cartList)), 200);
    }

    public function delFromCart(Request $request)
    {
        $item = Session('cartItem', []);
        $index = array_search($request->id, $item);
        unset($item[$index]);

        if (Session::has('logged') && Session('logged', true)) {
            $user_id = Session('user_id');
            $cart = new Cart();
            $cart->delFromCart($user_id, $request->id);
        }

        Session::put(['cartItem' => $item]);
        if ($item != null) {
            foreach ($item as $id) {
                $products[] = json_decode(Product::where('id_product', $id)->first()->toJson());
            }
        } else {
            $products = '';
        }
        return response()->json([
            'html' => view('userpage.cart', compact('products'))->render(),
            'item' => count($item)
        ], 200);
    }

    public function quantityProduct(Request $request)
    {
        $quantity = Session('quantityProduct', []);
        array_push($quantity, $request->id);
        Session::put(['quantityProduct' => $quantity]);
    }

    public function delQty()
    {
        Session::remove('quantityProduct');
    }

    public   function delCart()
    {
        Session::remove('cartItem');
    }

    public function checkout()
    {
        $cartItem = Session('cartItem');
        if ($cartItem != null) {
            foreach ($cartItem as $item) {
                $products[] = json_decode(Product::where('id_product', $item)->first());
            }
        } else {
            $products = '';
        }
        $quantity = Session('quantityProduct', []);
        return view('userpage.checkout', compact('products', 'quantity'));
    }

    public function order()
    {
        if (Session::has('logged') && Session('logged', true)) {
            $order = new Order();
            $cartItem = Session('cartItem');
            $quantity = Session('quantityProduct', []);
            $user_id = Session('user_id');
            $order->addOrder($user_id);
        }
        $cart = new CartController();
        $cart->delCart();
        $cart->delQty();
    }
}

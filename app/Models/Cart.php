<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;


class Cart extends Model
{

    use HasFactory;
    protected $table = "cart";

    public function add2Cart($id_user, $id_product)
    {
        Cart::updateOrInsert(
            [
                'id_user' => $id_user,
                'id_product' => $id_product,
                'amount' => 1
            ]
        );
    }

    public function getCart($id_user)
    {
        $getCart = json_decode(User::with('cart')->find($id_user));
        $cart = $getCart->cart;
        if ($cart != null) {
            foreach ($cart as $item) {
                $products[] = json_decode(Product::where('id_product', $item->id_product)->first());
            }
        } else {
            $products = '';
        }
        return $products;
    }

    public static function countCart($id_user)
    {
        $getCart = json_decode(User::with('cart')->find($id_user));
        $cart = $getCart->cart;
        if ($cart != null) {
            foreach ($cart as $item) {
                $itemCart[] = $item->id_product;
            }
        } else {
            $itemCart = '';
        }
        return $itemCart;
    }

    public function delFromCart($id_user, $id_product)
    {
        Cart::where(
            [
                'id_user' => $id_user,
                'id_product' => $id_product
            ]
        )->delete();
    }

    public function addQty($id_user, $id_product, $quantity)
    {
        Cart::where(
            [
                'id_user' => $id_user,
                'id_product' => $id_product,
            ]
        )->update(['amount' => $quantity]);
    }


}

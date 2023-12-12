<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        // カートに商品を追加
        Cart::create([
            'product_id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'stock' => $product->stock,
            'image' => $product->image,
            'quantity' => 1, // 任意の数量を指定するか、必要に応じてリクエストから取得する
        ]);
        return redirect('/cart')->with('success', 'カートに商品を追加しました');
    }

    public function show()
    {
        $cartData = Cart::all();
        return view('products.cart', ['cartData' => $cartData]);
    }

    public function remove($id)
    {
        // カートから特定の商品を削除
        Cart::where('id', $id)->delete();

        return redirect('/cart')->with('success', '商品がカートから削除されました。削除された商品ID: ' . $id);
    }

    public function bulk_purchase()
    {
        $cartData = Cart::all();
        
        $userData = Auth::user();

        return view('products.bulk_purchase', ['cartData' => $cartData], ['userData' => $userData]);
    }

    public function complete()
    {
        // カートのアイテムを取得
        $cartItems = Cart::all();

        // カートのアイテムを購入処理
        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);

            // 在庫を減らす
            $product->decrement('stock', $cartItem->quantity);

            // ここで他に必要な処理を追加することができます
        }

        // カートをクリア
        Cart::truncate();

        // ここで購入完了後のリダイレクトやビューを返す処理を実装します
        // 例えば、購入完了画面にリダイレクト
        return view('products.complete');
    }
}
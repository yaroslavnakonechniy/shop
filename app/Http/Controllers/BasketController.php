<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class BasketController extends Controller
{
    public function basket(){
        $orderId = session('orderId');
        if(!is_null($orderId)){
            $order = Order::findOrFail($orderId);
        }
        return view('basket', compact('order'));

    }

    public function addBasket($productId){
        $orderId = session('orderId');
        if(is_null($orderId)){
            $order = Order::create();
            session(['orderId' => $order->id]);
        }else{
            $order = Order::find($orderId);
        }

        if($order->products->contains($productId)){
            $PivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $PivotRow->count++;
            $PivotRow->update();
        }else{
            $order->products()->attach($productId);
        }

        $product = Product::find($productId);

        session()->flash('success','Продукт "'.$product->name.'" було додано в корзину');

        return redirect()->route('basket');
    }

    public function removeBasket($product_id){

        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('basket');
        }

        $order = Order::find($orderId);
        if($order->products->contains($product_id)){
            $PivotRow = $order->products()->where('product_id', $product_id)->first()->pivot;
            if($PivotRow->count < 2 ){
                $order->products()->detach($product_id);

            }else{
                $PivotRow->count--;
                $PivotRow->update();
            }
        }

        $product = Product::find($product_id);

        session()->flash('warning','Продукт "'.$product->name.'" було видалено з корзину');

        return redirect()->route('basket');

    }

    public function basketOrder(){
        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('basket');
        }

        $order = Order::find($orderId);
       
        return view('order', compact('order'));
    }

    public function basketConfirm(Request $request){
        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('basket');
        }

        $order = Order::find($orderId);

        $success = $order->getOrder($request->name, $request->phone);
        
        if($success){
            session()->flash('success', 'Замовлення було підтвкрджено');
        }else{
            session()->flash('warning', 'Сталася помилка');
        }

        return redirect()->route('index');
    }
}

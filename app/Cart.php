<?php

namespace App;


class Cart{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuanty = 0;

    public function __construct($cart){
        if($cart){
            // dd($cart->products);
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;
        }
    }
    public function AddCart($product,$id,$quantity=1){
        $newProduct = ['quanty' => $quantity,'price'=> $product->price,'productInfo' => $product];
        if($this->products){
            if(array_key_exists($id, $this->products)){
                $newProduct = $this->products[$id];
                $newProduct['quanty']+=1;
            }
        }
        if ($quantity!=1) {
            $newProduct['quanty']=$quantity;
        }
        
        $newProduct['price'] = $newProduct['quanty'] * $product->price;
        $this->products[$id] = $newProduct;
        $this->totalPrice += $product->price;
        $this->totalQuanty++;

    }

    public function DeleteItemCart($id){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }
    public function DeleteItemviewCart($id){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }
    public function UpdateItemviewCart($id, $quanty){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];

        $this->products[$id]['quanty'] = $quanty;
        $this->products[$id]['price'] = $quanty * $this->products[$id]['productInfo']->price;

        $this->totalQuanty += $this->products[$id]['quanty'];
        $this->totalPrice += $this->products[$id]['price'];
        
    }
    public function total_quantity(){
        $quantity=0;
        foreach ($this->products as $key => $value) {
            $quantity+=$value['quanty'];
        }
        return $quantity;
    }
    public function total_price(){
        $sum=0;
        foreach ($this->products as $key => $value) {
            $sum+=$value['price'];
        }
        return $sum;
    }
  
    
}


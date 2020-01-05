<?php

namespace App;


class Cart
{
    public $items=[];
    public $totalQty;
    public $totalPrice ;


    public function  __Construct($cart=null){
          if($cart){
              $this->items=$cart->items ;
              $this-> totalQty=$cart->totalQty ;
              $this->totalPrice=$cart->totalPrice ;
          }
          else{

              $this->items=$cart=[];
              $this-> totalQty=$cart=0 ;
              $this->totalPrice=$cart=0 ;
          }}

        public function add($product) {
            $item = [
                'id' => $product->id,
                'price' => $product->price,
                'qty' => 0,
                'title' => $product->title,
                'image' => $product->image,
            ];
            if( !array_key_exists($product->id, $this->items)) {
                $this->items[$product->id] = $item ;
                $this->totalQty +=1;
                $this->totalPrice += $product->price;

            } else {

                $this->totalQty +=1 ;
                $this->totalPrice += $product->price;
            }

            $this->items[$product->id]['qty']  += 1 ;

        }
    public function remove($id)
    {
        if( array_key_exists($id, $this->items)) {
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['qty'] * $this->items[$id]['price'];
            unset($this->items[$id]);
        }}


        public function updateQty($id,$qty)
    {
        //rest qty and pricein the cart
        $this->totalQty-=$this->items[$id]['qty'];
        $this->totalPrice-=$this->items[$id]['price']*$this->items[$id]['qty'];
//add the item with the qty
            $this->items[$id]['qty']=$qty ;
//total price
            $this->totalQty+=$qty ;
            $this->totalPrice+=$this->items[$id]['price']*$qty;

        }


}

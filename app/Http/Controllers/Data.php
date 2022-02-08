<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Data extends Controller
{
    public function __construct()
    {
        $this->userIds = ['U01', 'U02', 'U03'];
        $this->orderIds = ['T01', 'T02', 'T03', 'T04'];
        $this->userOrders = [
            [ 'userId' => 'U01', 'orderIds' => ['T01', 'T02'] ],
            [ 'userId' => 'U02', 'orderIds' => [] ],
            [ 'userId' => 'U03', 'orderIds' => ['T03'] ],
        ];
        $this->userData = [ 'U01'=> 'Tom', 'U02'=> 'Sam', 'U03'=> 'John'];

        $this->orderData = [
            'T01' => [ 'name' => 'A', 'price' => 499 ],
            'T02' => [ 'name' => 'B', 'price' => 599 ],
            'T03' => [ 'name' => 'C', 'price' => 699 ],
            'T04' => [ 'name' => 'D', 'price' => 799 ]
        ];
    }

    public function result()
    {
        $array = [];
        foreach($this->userOrders as $value){
            foreach($value as $key => $v){
                $real_array = [];
                if($key == 'userId'){
                    $real_array['user']['id'] = $v;
                    $real_array['user']['name'] = $this->userData[$v];
                }

                if($key == 'orderIds'){
                    $real_array['order'] = [];
                    if(!empty($v)){
                        foreach($v as $order){
                            $order = [];
                            $order['id'] = $order;
                            $order['name'] = $this->orderData[$order]['name'];
                            $order['price'] = $this->orderData[$order]['price'];
                            array_push($real_array['order'], $order);
                        }
                    }
                }
                array_push($array, $real_array);
            }
        }
        return json_encode($array);
    }
}

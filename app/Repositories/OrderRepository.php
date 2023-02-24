<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{

    public function getModel()
    {
        return \App\Models\Product::class;
    }
    
    public function getProduct()
    {
        return $this->model->select('product_name')->take(5)->get();
    }

    public function getAll() 
    {
        return Order::all()->toJson();
    }

    public function getById($orderId) 
    {
        return Order::findOrFail($orderId);
    }

    public function deleteId($orderId) 
    {
        Order::destroy($orderId);
    }
    
    /**
     * createOrder
     *
     * @param  mixed $orderDetails
     * @return void
     */
    public function createOrder(array $orderDetails) 
    {
        return Order::create($orderDetails);
    }

    public function updateOrder($orderId, array $newDetails) 
    {
        return Order::whereId($orderId)->update($newDetails);
    }

    public function getFulfilledOrders() 
    {
        return Order::where('is_fulfilled', true);
    }
}

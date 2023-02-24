<?php

namespace App\Repositories\Interfaces;

interface OrderRepositoryInterface 
{    
    /**
     * getAll
     *
     * @return void
     */
    public function getAll();    
    
    /**
     * getById
     *
     * @param  mixed $id
     * @return void
     */
    public function getById($id);
    
    /**
     * deleteId
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteId($id);    
    /**
     * createOrder
     *
     * @param  mixed $orderDetails
     * @return void
     */
    public function createOrder(array $array);

    public function updateOrder($orderId, array $newDetails);
    public function getFulfilledOrders();
}

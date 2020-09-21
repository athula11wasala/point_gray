<?php namespace App\Repository;

use App\Models\Order;

class OrderRepository
{

    /**
     * get Discount info
     * @param $request
     * @return mixed
     */
    public function getDiscountInfo($request)
    {
        return Order::all();
    }

    public function saveOrder($data)
    {

        $order = new Order();
        $order->name = $data->input('name');
        $order->percentage = $data->input('percentage');
        $order->no_of_service = $data->input('no_of_service');

        if ($order->save())
        {
            return true;
        }
        return false;
    }

    /**
     * update discount
     * @param $request
     * @return bool
     */
    public function updateDiscount($id, $request)
    {

        $objOrder = Order::find($id);
        $objOrder->{$request->input('property_name') } = $request->input('property_value');

        if ($objOrder->save())
        {
            return true;
        }
        return false;
    }

    /**
     * delete discount
     * @param $request
     * @return bool
     */
    public function deleteOrder($id)
    {
        $objOrder = Order::find($id);
        if (!empty($objOrder))
        {
            $objOrder->delete();
            return true;
        }

        return false;
    }
}


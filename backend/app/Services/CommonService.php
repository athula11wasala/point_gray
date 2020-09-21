<?php
namespace App\Services;

use App\Repository\OrderRepository;

class CommonService
{
    private  $orderRepository;

    /**
     * CmsService constructor.
     * @param OrderRepository $orderRepository
     */
    public function __construct( OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * get discount info
     * @param $data
     * @return \Illuminate\Database\Eloquent\Collection|null
     */
    public function getDisconutInfo($request){

        return $this->orderRepository->getDiscountInfo($request);
    }

    /**
     * create discount
     * @param $data
     * @return bool
     */
    public function createDiscount($data)
    {
        return $this->orderRepository->saveOrder ( $data );
    }

    /**
     * update discount info
     * @param $id
     * @param $request
     * @return bool
     */
    public function editDiscount($id, $request)
    {
        return $this->orderRepository->updateDiscount($id, $request );
    }

    /**
     * delete discount info
     * @param $id
     * @return bool
     */
    public function deleteOrder($id)
    {
        return $this->orderRepository->deleteOrder($id);
    }

}
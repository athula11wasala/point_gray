<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderValidateRequest;
use App\Traits\ApiResponser;
use App\Services\CommonService;

class OrderController extends Controller {

    use ApiResponser;
    private $commonService;

    public function __construct(CommonService $commonService){
        $this->commonService = $commonService;
    }

    /**
     * Get the discount details.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {

        try {
            $this->data = $this->commonService->getDisconutInfo($request->all());
            $this->message =      \config('messages.success');
            return response()->json($this->responseData());
        }
        catch(\PDOException $ex){

            return response()->json($this->pdoException($ex->getMessage()));
        }
        catch (\Exception $ex){

            $this->error = $ex->getMessage();
            return response()->json($this->responseData(),$ex->getCode());
        }

    }
    /**
     * delete discount details.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteOrder($id) {

        try {
            $this->data = $this->commonService->deleteOrder($id);
            $this->message =  \config('messages.discount_deleted');
            return response()->json($this->responseData());
        }
        catch(\PDOException $ex){

            return response()->json($this->pdoException($ex->getMessage()));
        }
        catch (\Exception $ex){

            $this->error = $ex->getMessage();
            return response()->json($this->responseData(),$ex->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateOrder(Request $request, $id)
    {
        try {

            $this->data = $this->commonService->editDiscount($id,$request);
            $this->message =  \config('messages.discount_updated');
            return response()->json($this->responseData());
        }
        catch(\PDOException $ex){

            return response()->json($this->pdoException($ex->getMessage()));
        }
        catch (\Exception $ex){

            return response()->json($this->unProcessRequest( $ex->getMessage(),$ex->getCode()));
        }

    }


    /**
     *  add the specified resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addDiscount(OrderValidateRequest $request) {

        try {

            $this->data = $this->commonService->createDiscount($request);
            $this->message =  \config('messages.discount_create');
            return response()->json($this->responseData());
        }
        catch(\PDOException $ex){

            return response()->json($this->pdoException($ex->getMessage()));
        }
        catch (\Exception $ex){

            return response()->json($this->unProcessRequest( $ex->getMessage(),$ex->getCode()));
        }

    }



}


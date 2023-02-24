<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\OrderRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    private OrderRepositoryInterface $orderRepository;

    /**
     * __construct
     *
     * @param  mixed $orderRepository
     * @return void
     */
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $data = $this->orderRepository->getAll();
        dd($data);
        return view('home.home', compact('data'));
    }

    public function store(Request $request): JsonResponse
    {
        $orderDetails = $request->only([
            'client',
            'details'
        ]);
        $rules = [
            'client' => 'required',
            'details' => 'required'
        ];
        $validator = Validator::make($orderDetails, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator->errors());
        }
        try {
            // Save the user
            DB::commit();
            return response()->json(
                [
                    'data' => $this->orderRepository->createOrder($orderDetails)
                ],
                Response::HTTP_CREATED
            )->withSuccess('IT WORKS!');;
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function show(Request $request): JsonResponse
    {
        $orderId = $request->route('id');

        return response()->json([
            'data' => $this->orderRepository->getById($orderId)
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        try {
            DB::commits();
            //code...
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
            //throw $th;
        }
        $orderId = $request->route('id');
        $orderDetails = $request->only([
            'client',
            'details'
        ]);

        return response()->json([
            'data' => $this->orderRepository->updateOrder($orderId, $orderDetails)
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $orderId = $request->route('id');
        $this->orderRepository->deleteId($orderId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

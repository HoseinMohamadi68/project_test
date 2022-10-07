<?php

namespace App\Http\Controllers;

use App\Filters\Contacts\OrderFilter;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * @param OrderFilter $filters Filters.
     * @param Request      $request Request.
     *
     * @return AnonymousResourceCollection
     */
    public function index(OrderFilter $filters, Request $request): AnonymousResourceCollection
    {
        return OrderResource::collection(Order::filter($filters)->paginate($this->getPageSize($request)));
    }

    /**
     * @param OrderRequest $request OrderRequest.
     *
     * @return OrderResource
     */
    public function store(OrderRequest $request): OrderResource
    {
        $result = Order::createObject(
            [
                $request->get(Order::TOTAL_AMOUNT),
                $request->get(Order::DISCOUNT),
            ]
        );

        return new OrderResource($result);
    }

    /**
     * @param Order $order Order Object Model.
     *
     * @return OrderResource
     */
    public function show(Order $order): OrderResource
    {
        return new OrderResource($order);
    }

    /**
     * @param OrderRequest $request Request.
     * @param Order        $order  Order Object Model.
     *
     * @return OrderResource
     */
    public function update(OrderRequest $request, Order $order): OrderResource
    {
        $order->updateObject(
            [
                $request->get(Order::TOTAL_AMOUNT),
                $request->get(Order::DISCOUNT),
            ]
        );

        return new OrderResource($order);
    }

    /**
     * @param Order $order Order.
     *
     * @return JsonResponse
     */
    public function destroy(Order $order): JsonResponse
    {
        try {
            $order->delete();

            return $this->getResponse([], Response::HTTP_NO_CONTENT);
        } catch (\Exception $exception) {
            Log::error('Delete Order Error : ' . $exception->getMessage());

            return $this->getResponse([], Response::HTTP_CONFLICT);
        }
    }
}

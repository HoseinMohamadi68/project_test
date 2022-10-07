<?php

namespace App\Http\Controllers;

use App\Filters\Contacts\OrderItemFilter;
use App\Http\Requests\OrderItemRequest;
use App\Http\Resources\OrderItemResource;
use App\Models\OrderItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class OrderItemController extends Controller
{
    /**
     * @param OrderItemFilter $filters Filters.
     * @param Request      $request Request.
     *
     * @return AnonymousResourceCollection
     */
    public function index(OrderItemFilter $filters, Request $request): AnonymousResourceCollection
    {
        return OrderItemResource::collection(OrderItem::filter($filters)->paginate($this->getPageSize($request)));
    }

    /**
     * @param OrderItemRequest $request OrderItemRequest.
     *
     * @return OrderItemResource
     */
    public function store(OrderItemRequest $request): OrderItemResource
    {
        $result = OrderItem::createObject(
            [
                $request->get(OrderItem::ORDER_ID),
                $request->get(OrderItem::COURSE_ID),
                $request->get(OrderItem::AMOUNT),
            ]
        );

        return new OrderItemResource($result);
    }

    /**
     * @param OrderItem $orderItem OrderItem Object Model.
     *
     * @return OrderItemResource
     */
    public function show(OrderItem $orderItem): OrderItemResource
    {
        return new OrderItemResource($orderItem);
    }

    /**
     * @param OrderItemRequest $request Request.
     * @param OrderItem        $orderItem  OrderItem Object Model.
     *
     * @return OrderItemResource
     */
    public function update(OrderItemRequest $request, OrderItem $orderItem): OrderItemResource
    {
        $orderItem->updateObject(
            [
                $request->get(OrderItem::ORDER_ID),
                $request->get(OrderItem::COURSE_ID),
                $request->get(OrderItem::AMOUNT),
            ]
        );

        return new OrderItemResource($orderItem);
    }

    /**
     * @param OrderItem $orderItem OrderItem.
     *
     * @return JsonResponse
     */
    public function destroy(OrderItem $orderItem): JsonResponse
    {
        try {
            $orderItem->delete();

            return $this->getResponse([], Response::HTTP_NO_CONTENT);
        } catch (\Exception $exception) {
            Log::error('Delete OrderItem Error : ' . $exception->getMessage());

            return $this->getResponse([], Response::HTTP_CONFLICT);
        }
    }
}

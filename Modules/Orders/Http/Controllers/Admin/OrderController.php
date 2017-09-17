<?php

namespace Modules\Orders\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Orders\Entities\Order;
use Modules\Orders\Http\Requests\CreateOrderRequest;
use Modules\Orders\Http\Requests\UpdateOrderRequest;
use Modules\Orders\Repositories\OrderRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

use Modules\Dishes\Entities\Dish;
use Modules\Media\Repositories\FileRepository;

class OrderController extends AdminBaseController
{
    /**
     * @var OrderRepository
     */
    private $order;

    public function __construct(OrderRepository $order)
    {
        parent::__construct();

        $this->order = $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(FileRepository $files)
    {
        $orders = $this->order->all();

//        $dishesh_images = $files->findFileByZoneForEntity('Dishes', $mainpage->first());

        $dishes = Dish::all();
        return view('orders::admin.orders.index', compact('orders', 'dishes', 'files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('orders::admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateOrderRequest $request
     * @return Response
     */
    public function store(CreateOrderRequest $request)
    {
        $this->order->create($request->all());

        return redirect()->route('admin.orders.order.index')
            ->withSuccess(trans('orders::orders.messages.resource created', ['name' => trans('orders::orders.title.orders')]));
    }

    public function user_store(CreateOrderRequest $request)
    {
        $this->order->create($request->all());

        return redirect()->route('homepage')
            ->withSuccess(trans('orders::orders.messages.order created by user'));
    }

    public function user_store_menu(CreateOrderRequest $request)
    {
        $this->order->create($request->all());

        return redirect()->route('menu')
            ->withSuccess(trans('orders::orders.messages.order created by user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Order $order
     * @return Response
     */
    public function edit(Order $order)
    {
        return view('orders::admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Order $order
     * @param  UpdateOrderRequest $request
     * @return Response
     */
    public function update(Order $order, UpdateOrderRequest $request)
    {
        $this->order->update($order, $request->all());

        return redirect()->route('admin.orders.order.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('orders::orders.title.orders')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Order $order
     * @return Response
     */
    public function destroy(Order $order)
    {
        $this->order->destroy($order);

        return redirect()->route('admin.orders.order.index')
            ->withSuccess(trans('orders::orders.messages.resource deleted', ['name' => trans('orders::orders.title.orders')]));
    }
}

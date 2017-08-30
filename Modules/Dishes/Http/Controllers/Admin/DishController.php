<?php

namespace Modules\Dishes\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Dishes\Entities\Dish;
use Modules\Dishes\Entities\DishCategory;
use Modules\Dishes\Http\Requests\CreateDishRequest;
use Modules\Dishes\Http\Requests\UpdateDishRequest;
use Modules\Dishes\Repositories\DishRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

use Modules\Media\Repositories\FileRepository;

class DishController extends AdminBaseController
{
    /**
     * @var DishRepository
     */
    private $dish;
    private $file;

    public function __construct(DishRepository $dish, FileRepository $file)
    {
        parent::__construct();

        $this->dish = $dish;
        $this->file = $file;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $dishes = $this->dish->all();

        $categories = DishCategory::all();

        return view('dishes::admin.dishes.index', compact('dishes', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = DishCategory::all();

        return view('dishes::admin.dishes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateDishRequest $request
     * @return Response
     */
    public function store(CreateDishRequest $request)
    {
        $this->dish->create($request->all());

        return redirect()->route('admin.dishes.dish.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('dishes::dishes.title.dishes')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Dish $dish
     * @return Response
     */
    public function edit(Dish $dish)
    {
        $categories = DishCategory::all();

        $thumbnail = $this->file->findFileByZoneForEntity('DishesGallery', $dish);
        return view('dishes::admin.dishes.edit', compact('dish', 'thumbnail', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Dish $dish
     * @param  UpdateDishRequest $request
     * @return Response
     */
    public function update(Dish $dish, UpdateDishRequest $request)
    {
        $this->dish->update($dish, $request->all());

        return redirect()->route('admin.dishes.dish.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('dishes::dishes.title.dishes')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Dish $dish
     * @return Response
     */
    public function destroy(Dish $dish)
    {
        $this->dish->destroy($dish);

        return redirect()->route('admin.dishes.dish.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('dishes::dishes.title.dishes')]));
    }
}

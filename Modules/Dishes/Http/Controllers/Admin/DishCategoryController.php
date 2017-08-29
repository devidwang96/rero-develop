<?php

namespace Modules\Dishes\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Dishes\Entities\DishCategory;
use Modules\Dishes\Http\Requests\CreateDishCategoryRequest;
use Modules\Dishes\Http\Requests\UpdateDishCategoryRequest;
use Modules\Dishes\Repositories\DishCategoryRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

use Modules\Media\Repositories\FileRepository;

class DishCategoryController extends AdminBaseController
{
    /**
     * @var DishCategoryRepository
     */
    private $dishcategory;
    private $file;

    public function __construct(DishCategoryRepository $dishcategory, FileRepository $file)
    {
        parent::__construct();

        $this->dishcategory = $dishcategory;
        $this->file = $file;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $dishcategories = $this->dishcategory->all();

        return view('dishes::admin.dishcategories.index', compact('dishcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dishes::admin.dishcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateDishCategoryRequest $request
     * @return Response
     */
    public function store(CreateDishCategoryRequest $request)
    {
        $this->dishcategory->create($request->all());

        return redirect()->route('admin.dishes.dishcategory.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('dishes::dishcategories.title.dishcategories')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  DishCategory $dishcategory
     * @return Response
     */
    public function edit(DishCategory $dishcategory)
    {
        $thumbnail = $this->file->findFileByZoneForEntity('DishesCategoryThumb', $dishcategory);
        return view('dishes::admin.dishcategories.edit', compact('dishcategory', 'thumbnail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DishCategory $dishcategory
     * @param  UpdateDishCategoryRequest $request
     * @return Response
     */
    public function update(DishCategory $dishcategory, UpdateDishCategoryRequest $request)
    {
        $this->dishcategory->update($dishcategory, $request->all());

        return redirect()->route('admin.dishes.dishcategory.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('dishes::dishcategories.title.dishcategories')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DishCategory $dishcategory
     * @return Response
     */
    public function destroy(DishCategory $dishcategory)
    {
        $this->dishcategory->destroy($dishcategory);

        return redirect()->route('admin.dishes.dishcategory.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('dishes::dishcategories.title.dishcategories')]));
    }
}

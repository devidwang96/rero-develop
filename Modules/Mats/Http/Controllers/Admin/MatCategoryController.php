<?php

namespace Modules\Mats\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Mats\Entities\MatCategory;
use Modules\Mats\Http\Requests\CreateMatCategoryRequest;
use Modules\Mats\Http\Requests\UpdateMatCategoryRequest;
use Modules\Mats\Repositories\MatCategoryRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

use Modules\Media\Repositories\FileRepository;

class MatCategoryController extends AdminBaseController
{
    /**
     * @var MatCategoryRepository
     */
    private $matcategory;
    private $file;

    public function __construct(MatCategoryRepository $matcategory, FileRepository $file)
    {
        parent::__construct();

        $this->matcategory = $matcategory;
        $this->file = $file;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $matcategories = $this->matcategory->all();

        return view('mats::admin.matcategories.index', compact('matcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('mats::admin.matcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateMatCategoryRequest $request
     * @return Response
     */
    public function store(CreateMatCategoryRequest $request)
    {
        $this->matcategory->create($request->all());

        return redirect()->route('admin.mats.matcategory.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('mats::matcategories.title.matcategories')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  MatCategory $matcategory
     * @return Response
     */
    public function edit(MatCategory $matcategory)
    {
        $thumbnail = $this->file->findFileByZoneForEntity('MatsCategoryThumb', $matcategory);
        return view('mats::admin.matcategories.edit', compact('matcategory', 'thumbnail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MatCategory $matcategory
     * @param  UpdateMatCategoryRequest $request
     * @return Response
     */
    public function update(MatCategory $matcategory, UpdateMatCategoryRequest $request)
    {
        $this->matcategory->update($matcategory, $request->all());

        return redirect()->route('admin.mats.matcategory.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('mats::matcategories.title.matcategories')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  MatCategory $matcategory
     * @return Response
     */
    public function destroy(MatCategory $matcategory)
    {
        $this->matcategory->destroy($matcategory);

        return redirect()->route('admin.mats.matcategory.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('mats::matcategories.title.matcategories')]));
    }
}

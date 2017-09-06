<?php

namespace Modules\Mats\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Mats\Entities\Mat;
use Modules\Mats\Entities\MatCategory;
use Modules\Mats\Http\Requests\CreateMatRequest;
use Modules\Mats\Http\Requests\UpdateMatRequest;
use Modules\Mats\Repositories\MatRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

use Modules\Media\Repositories\FileRepository;

class MatController extends AdminBaseController
{
    /**
     * @var MatRepository
     */
    private $mat;
    private $file;

    public function __construct(MatRepository $mat, FileRepository $file)
    {
        parent::__construct();

        $this->mat = $mat;
        $this->file = $file;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $mats = $this->mat->all();

        $categories = MatCategory::all();

        return view('mats::admin.mats.index', compact('mats', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = MatCategory::all();

        return view('mats::admin.mats.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateMatRequest $request
     * @return Response
     */
    public function store(CreateMatRequest $request)
    {
        $this->mat->create($request->all());

        return redirect()->route('admin.mats.mat.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('mats::mats.title.mats')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Mat $mat
     * @return Response
     */
    public function edit(Mat $mat)
    {
        $categories = MatCategory::all();

        $thumbnail = $this->file->findFileByZoneForEntity('MatsGallery', $mat);
        return view('mats::admin.mats.edit', compact('mat', 'thumbnail', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Mat $mat
     * @param  UpdateMatRequest $request
     * @return Response
     */
    public function update(Mat $mat, UpdateMatRequest $request)
    {
        $this->mat->update($mat, $request->all());

        return redirect()->route('admin.mats.mat.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('mats::mats.title.mats')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Mat $mat
     * @return Response
     */
    public function destroy(Mat $mat)
    {
        $this->mat->destroy($mat);

        return redirect()->route('admin.mats.mat.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('mats::mats.title.mats')]));
    }
}

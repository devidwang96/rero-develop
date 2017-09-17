<?php

namespace Modules\Pagesets\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Pagesets\Entities\Sets;
use Modules\Pagesets\Http\Requests\CreateSetsRequest;
use Modules\Pagesets\Http\Requests\UpdateSetsRequest;
use Modules\Pagesets\Repositories\SetsRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

use Modules\Media\Repositories\FileRepository;

class SetsController extends AdminBaseController
{
    /**
     * @var SetsRepository
     */
    private $sets;
    private $file;

    public function __construct(SetsRepository $sets, FileRepository $file)
    {
        parent::__construct();

        $this->sets = $sets;
        $this->file = $file;
    }

    public function edit(Sets $sets)
    {
        return view('pagesets::admin.sets.edit', compact('sets'));
    }

    public function update(Sets $sets, UpdateSetsRequest $request)
    {
        $this->sets->update($sets, $request->all());

        return redirect()->route('admin.pagesets.sets.edit', 1)
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('pagesets::sets.title.sets')]));
    }
}

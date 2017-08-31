<?php

namespace Modules\MainPage\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\MainPage\Entities\Mainpage;
use Modules\MainPage\Http\Requests\CreateMainpageRequest;
use Modules\MainPage\Http\Requests\UpdateMainpageRequest;
use Modules\MainPage\Repositories\MainpageRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

use Modules\Media\Repositories\FileRepository;

class MainpageController extends AdminBaseController
{
    private $mainpage;
    private $file;

    public function __construct(MainpageRepository $mainpage, FileRepository $file)
    {
        parent::__construct();

        $this->mainpage = $mainpage;
        $this->file = $file;
    }

    public function edit(Mainpage $mainpage)
    {
        $bg_gallery = $this->file->findFileByZoneForEntity('IndexBg', $mainpage);
        $about_gallery = $this->file->findFileByZoneForEntity('IndexAbout', $mainpage);
        return view('mainpage::admin.mainpages.edit', compact('mainpage', 'bg_gallery', 'about_gallery'));
    }

    public function update(Mainpage $mainpage, UpdateMainpageRequest $request)
    {
        $this->mainpage->update($mainpage, $request->all());

        return redirect()->route('admin.mainpage.mainpage.edit', 1)
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('mainpage::mainpages.title.mainpages')]));
    }

}

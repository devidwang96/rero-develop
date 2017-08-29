<?php

namespace Modules\News\Http\Controllers\Admin;

use Modules\News\Entities\News;
use Modules\News\Http\Requests\CreateNewsRequest;
use Modules\News\Http\Requests\UpdateNewsRequest;
use Modules\News\Repositories\CategoryRepository;
use Modules\News\Repositories\NewsRepository;

use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Media\Repositories\FileRepository;

class NewsController extends AdminBaseController
{


    private $news;
    private $category;


    public function __construct(
        NewsRepository $news,
        CategoryRepository $category
    ) {
        parent::__construct();

        $this->news = $news;
        $this->category = $category;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $news = $this->news->all();

        return view('news::admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->category->allTranslatedIn(app()->getLocale());
        $this->assetPipeline->requireJs('ckeditor.js');
        return view('news::admin.news.create', compact('categories', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateNewsRequest $request
     * @return Response
     */
    public function store(CreateNewsRequest $request)
    {
        $this->news->create($request->all());

        return redirect()->route('admin.news.news.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('news::news.title.news')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return Response
     */
    public function edit(News $news)
    {


        $categories = $this->category->allTranslatedIn(app()->getLocale());
        $this->assetPipeline->requireJs('ckeditor.js');

        return view('news::admin.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  News $news
     * @param  UpdateNewsRequest $request
     * @return Response
     */
    public function update(News $news, UpdateNewsRequest $request)
    {
        $this->news->update($news, $request->all());

        return redirect()->route('admin.news.news.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('news::news.title.news')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return Response
     */
    public function destroy(News $news)
    {
        $this->news->destroy($news);

        return redirect()->route('admin.news.news.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('news::news.title.news')]));
    }
}

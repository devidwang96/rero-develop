<?php

namespace Modules\Feedbacks\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Feedbacks\Entities\Feedback;
use Modules\Feedbacks\Http\Requests\CreateFeedbackRequest;
use Modules\Feedbacks\Http\Requests\UpdateFeedbackRequest;
use Modules\Feedbacks\Repositories\FeedbackRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

use Modules\Media\Repositories\FileRepository;

class FeedbackController extends AdminBaseController
{
    /**
     * @var FeedbackRepository
     */
    private $feedback;
    private $file;

    public function __construct(FeedbackRepository $feedback, FileRepository $file)
    {
        parent::__construct();
        $this->file = $file;
        $this->feedback = $feedback;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $feedbacks = $this->feedback->all();

        return view('feedbacks::admin.feedback.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('feedbacks::admin.feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateFeedbackRequest $request
     * @return Response
     */
    public function store(CreateFeedbackRequest $request)
    {
        $this->feedback->create($request->all());

        return redirect()->route('admin.feedbacks.feedback.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('feedbacks::feedback.title.feedback')]));
    }

//
//    public function user_store(CreateFeedbackRequest $request)
//    {
//        $this->feedback->create($request->all());
//
//        return redirect()->route($request->curpage)
//            ->withSuccess(trans('feedbacks::feedback.messages.feedback created by user'));
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Feedback $feedback
     * @return Response
     */
    public function edit(Feedback $feedback)
    {
        return view('feedbacks::admin.feedback.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Feedback $feedback
     * @param  UpdateFeedbackRequest $request
     * @return Response
     */
    public function update(Feedback $feedback, UpdateFeedbackRequest $request)
    {
        $this->feedback->update($feedback, $request->all());

        return redirect()->route('admin.feedbacks.feedback.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('feedbacks::feedback.title.feedback')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Feedback $feedback
     * @return Response
     */
    public function destroy(Feedback $feedback)
    {
        $this->feedback->destroy($feedback);

        return redirect()->route('admin.feedbacks.feedback.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('feedbacks::feedback.title.feedback')]));
    }
}

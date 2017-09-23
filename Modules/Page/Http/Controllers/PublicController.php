<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Modules\Core\Http\Controllers\BasePublicController;


use Modules\Feedbacks\Events\FeedbackIsCreating;
use Modules\Feedbacks\Entities\Feedback;
use Modules\Feedbacks\Http\Requests\CreateFeedbackRequest;
use Modules\Feedbacks\Repositories\FeedbackRepository;

use Modules\Orders\Entities\Order;
use Modules\Orders\Http\Requests\CreateOrderRequest;
use Modules\Orders\Repositories\OrderRepository;

use Modules\Menu\Repositories\MenuItemRepository;
use Modules\Page\Entities\Page;
use Modules\Page\Repositories\PageRepository;

use Modules\Media\Repositories\FileRepository;

use Modules\Dishes\Entities\Dish;
use Modules\Dishes\Entities\DishCategory;

use Modules\Pagesets\Entities\Sets;

use Modules\Mats\Entities\Mat;
use Modules\Mats\Entities\MatCategory;

class PublicController extends BasePublicController
{
    /**
     * @var PageRepository
     */
    private $page;
    /**
     * @var Application
     */
    private $app;

    private $feedback;
    private $file;

    private $order;

    public function __construct(PageRepository $page, Application $app, FileRepository $file, FeedbackRepository $feedback, OrderRepository $order)
    {
        parent::__construct();
        $this->page = $page;
        $this->app = $app;

        $this->file = $file;
        $this->feedback = $feedback;
        $this->order = $order;
    }

    /**
     * @param $slug
     * @return \Illuminate\View\View
     */
    public function uri($slug)
    {
        $page = $this->findPageForSlug($slug);

        $this->throw404IfNotFound($page);

        $template = $this->getTemplateForPage($page);

        return view($template, compact('page'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function homepage(FileRepository $files)
    {

        $dishes = Dish::all()
            ->where('status', '=',1)
            ->where('on_main', '=', 1);

        $categories = DishCategory::all();

        $pagesets = Sets::all();

        $feedbacks = Feedback::all()->where('status', '=', 1);

        return view('home', compact('dishes', 'files', 'categories', 'pagesets', 'feedbacks'));
    }





    public function news(FileRepository $files)
    {
        $mats = Mat::all()->where('status', '=', 1)->where('mat_type', '=', 1);
        $mat_categories = MatCategory::all()->where('status', '=', 1)->where('category_type', '=', 1);
        $feedbacks = Feedback::all()->where('status', '=', 1);
        $pagesets = Sets::all();
        return view('news', compact( 'mats', 'mat_categories', 'feedbacks', 'pagesets', 'files'));
    }
    public function newsInner(FileRepository $files)
    {
        $mats = Mat::all()->where('status', '=', 1)->where('mat_type', '=', 1);
        $mat_categories = MatCategory::all()->where('status', '=', 1)->where('category_type', '=', 1);
        $feedbacks = Feedback::all()->where('status', '=', 1);
        $pagesets = Sets::all();
        return view('news-inner', compact( 'mats', 'mat_categories', 'feedbacks', 'pagesets', 'files'));
    }
    public function gallery(FileRepository $files)
    {
        $mats = Mat::all()->where('status', '=', 1)->where('mat_type', '=', 4);
        $mat_categories = MatCategory::all()->where('status', '=', 1)->where('category_type', '=', 4);
        $feedbacks = Feedback::all()->where('status', '=', 1);
        $pagesets = Sets::all();
        return view('gallery', compact( 'mats', 'mat_categories', 'feedbacks', 'pagesets', 'files'));
    }
    public function events(FileRepository $files)
    {
        $mats = Mat::all()->where('status', '=', 1)->where('mat_type', '=', 2);
        $mat_categories = MatCategory::all()->where('status', '=', 1)->where('category_type', '=', 2);
        $feedbacks = Feedback::all()->where('status', '=', 1);
        $pagesets = Sets::all();
        return view('events', compact( 'mats', 'mat_categories', 'feedbacks', 'pagesets', 'files'));
    }
    public function eventsInner(FileRepository $files)
    {
        $mats = Mat::all()->where('status', '=', 1)->where('mat_type', '=', 2);
        $mat_categories = MatCategory::all()->where('status', '=', 1)->where('category_type', '=', 2);
        $feedbacks = Feedback::all()->where('status', '=', 1);
        $pagesets = Sets::all();
        return view('events-inner', compact( 'mats', 'mat_categories', 'feedbacks', 'pagesets', 'files'));
    }
    public function collective(FileRepository $files)
    {
        $mats = Mat::all()->where('status', '=', 1)->where('mat_type', '=', 3);
        $mat_categories = MatCategory::all()->where('status', '=', 1)->where('category_type', '=', 3);
        $feedbacks = Feedback::all()->where('status', '=', 1);
        $pagesets = Sets::all();
        return view('collective', compact( 'mats', 'mat_categories', 'feedbacks', 'pagesets', 'files'));
    }


    public function feedback_user_create(CreateFeedbackRequest $request){
        $this->feedback->create($request->all());
        return redirect()->route($request->curpage)
            ->withSuccess(trans('feedbacks::feedback.messages.feedback created by user'));
    }


    public function order_user_create(CreateOrderRequest $request){
        $this->order->create($request->all());
        return redirect()->route($request->curpage)
            ->withSuccess(trans('orders::orders.messages.order created by user'));
    }


    public function menu(FileRepository $files)
    {

        $dishes = Dish::all()
            ->where('status', '=',1);

        $categories = DishCategory::all();
        $feedbacks = Feedback::all()->where('status', '=', 1);
        $pagesets = Sets::all();

        return view('menu', compact('dishes', 'categories', 'pagesets', 'feedbacks', 'files'));
    }

    /**
     * Find a page for the given slug.
     * The slug can be a 'composed' slug via the Menu
     * @param string $slug
     * @return Page
     */
    private function findPageForSlug($slug)
    {
        $menuItem = app(MenuItemRepository::class)->findByUriInLanguage($slug, locale());

        if ($menuItem) {
            return $this->page->find($menuItem->page_id);
        }

        return $this->page->findBySlug($slug);
    }

    /**
     * Return the template for the given page
     * or the default template if none found
     * @param $page
     * @return string
     */
    private function getTemplateForPage($page)
    {
        return (view()->exists($page->template)) ? $page->template : 'default';
    }

    /**
     * Throw a 404 error page if the given page is not found
     * @param $page
     */
    private function throw404IfNotFound($page)
    {
        if (is_null($page)) {
            $this->app->abort('404');
        }
    }
}

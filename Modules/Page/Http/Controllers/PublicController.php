<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Feedbacks\Events\FeedbackIsCreating;
use Modules\Menu\Repositories\MenuItemRepository;
use Modules\Page\Entities\Page;
use Modules\Page\Repositories\PageRepository;

use Modules\Media\Repositories\FileRepository;

use Modules\Dishes\Entities\Dish;
use Modules\Dishes\Entities\DishCategory;

use Modules\MainPage\Entities\Mainpage;
use Modules\Feedbacks\Entities\Feedback;

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

    public function __construct(PageRepository $page, Application $app)
    {
        parent::__construct();
        $this->page = $page;
        $this->app = $app;
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

        $mainpage = Mainpage::all();

        $feedbacks = Feedback::all()->where('status', '=', 1);

        $page = $this->page->findHomepage();

        $this->throw404IfNotFound($page);

        $template = $this->getTemplateForPage($page);

        return view($template, compact('page', 'dishes', 'files', 'categories', 'mainpage', 'feedbacks'));
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

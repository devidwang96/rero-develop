<?php

namespace Modules\Dishes\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterDishesSidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('dishes::dishes.title.dishes'), function (Item $item) {
                $item->icon('fa fa-cutlery');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('dishes::dishes.title.dishes'), function (Item $item) {
                    $item->icon('fa fa-cutlery');
                    $item->weight(0);
                    $item->append('admin.dishes.dish.create');
                    $item->route('admin.dishes.dish.index');
                    $item->authorize(
                        $this->auth->hasAccess('dishes.dishes.index')
                    );
                });
                $item->item(trans('dishes::dishcategories.title.dishcategories'), function (Item $item) {
                    $item->icon('fa fa-cutlery');
                    $item->weight(0);
                    $item->append('admin.dishes.dishcategory.create');
                    $item->route('admin.dishes.dishcategory.index');
                    $item->authorize(
                        $this->auth->hasAccess('dishes.dishcategories.index')
                    );
                });

            });
        });

        return $menu;
    }
}

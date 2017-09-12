<?php

namespace Modules\Mats\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterMatsSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('mats::mats.title.mats'), function (Item $item) {
                $item->icon('fa fa-clipboard');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('mats::mats.title.mats'), function (Item $item) {
                    $item->icon('fa fa-clipboard');
                    $item->weight(0);
                    $item->append('admin.mats.mat.create');
                    $item->route('admin.mats.mat.index');
                    $item->authorize(
                        $this->auth->hasAccess('mats.mats.index')
                    );
                });
                $item->item(trans('mats::matcategories.title.matcategories'), function (Item $item) {
                    $item->icon('fa fa-clipboard');
                    $item->weight(0);
                    $item->append('admin.mats.matcategory.create');
                    $item->route('admin.mats.matcategory.index');
                    $item->authorize(
                        $this->auth->hasAccess('mats.matcategories.index')
                    );
                });

            });
        });

        return $menu;
    }
}

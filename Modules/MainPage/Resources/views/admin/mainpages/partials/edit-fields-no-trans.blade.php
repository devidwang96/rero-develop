<div class="box-body">
    <div class="row">

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="checkbox">
                <label for="menu_button_show">
                    <input id="menu_button_show"
                           name="menu_button_show"
                           type="checkbox"
                           class="flat-blue"
                          {{ isset($mainpage->menu_button_show) && (bool)$mainpage->menu_button_show == true ? 'checked' : '' }}
                           value="1" />
                    {{ trans('dishes::dishes.form.menu_button_show') }}
                </label><br>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="checkbox">
                <label for="dishes_categories_show">
                    <input id="dishes_categories_show"
                           name="dishes_categories_show"
                           type="checkbox"
                           class="flat-blue"
                           {{ isset($mainpage->dishes_categories_show) && (bool)$mainpage->dishes_categories_show == true ? 'checked' : '' }}
                           value="1" />
                    {{ trans('dishes::dishes.form.dishes_categories_show') }}
                </label><br>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="checkbox">
                <label for="dishes_menu_show">
                    <input id="dishes_menu_show"
                           name="dishes_menu_show"
                           type="checkbox"
                           class="flat-blue"
                          {{ isset($mainpage->dishes_menu_show) && (bool)$mainpage->dishes_menu_show == true ? 'checked' : '' }}
                           value="1" />
                    {{ trans('dishes::dishes.form.dishes_menu_show') }}
                </label><br>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="checkbox">
                <label for="dishes_show">
                    <input id="dishes_show"
                           name="dishes_show"
                           type="checkbox"
                           class="flat-blue"
                           {{ isset($mainpage->dishes_show) && (bool)$mainpage->dishes_show == true ? 'checked' : '' }}
                           value="1" />
                    {{ trans('dishes::dishes.form.dishes_show') }}
                </label><br>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="checkbox">
                <label for="gallery_show">
                    <input id="gallery_show"
                           name="gallery_show"
                           type="checkbox"
                           class="flat-blue"
                          {{ isset($mainpage->gallery_show) && (bool)$mainpage->gallery_show == true ? 'checked' : '' }}
                           value="1" />
                    {{ trans('dishes::dishes.form.gallery_show') }}
                </label><br>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="checkbox">
                <label for="feedbacks_show">
                    <input id="feedbacks_show"
                           name="feedbacks_show"
                           type="checkbox"
                           class="flat-blue"
                           {{ isset($mainpage->feedbacks_show) && (bool)$mainpage->feedbacks_show == true ? 'checked' : '' }}
                           value="1" />
                    {{ trans('dishes::dishes.form.feedbacks_show') }}
                </label><br>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="checkbox">
                <label for="addition_content_show">
                    <input id="addition_content_show"
                           name="addition_content_show"
                           type="checkbox"
                           class="flat-blue"
                          {{ isset($mainpage->addition_content_show) && (bool)$mainpage->addition_content_show == true ? 'checked' : '' }}
                           value="1" />
                    {{ trans('dishes::dishes.form.addition_content_show') }}
                </label><br>
            </div>
        </div>
    </div>
</div>
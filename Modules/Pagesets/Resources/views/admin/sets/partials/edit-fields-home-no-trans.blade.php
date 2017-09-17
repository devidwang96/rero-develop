<div class="checkbox">
    <?php $old_home_menu_button_show = $sets->home_menu_button_show ?>
    <label for="home_menu_button_show">
        <input id="home_menu_button_show"
               name="home_menu_button_show"
               type="checkbox"
               class="flat-blue"
               {{ ((bool) $old_home_menu_button_show) ? 'checked' : '' }}
               value="1" />
        {{ trans('pagesets::sets.form.home_menu_button_show') }}
    </label><br>
</div>

<div class="checkbox">
    <?php $old_home_dishes_categories_show = $sets->home_dishes_categories_show ?>
    <label for="home_dishes_categories_show">
        <input id="home_dishes_categories_show"
               name="home_dishes_categories_show"
               type="checkbox"
               class="flat-blue"
               {{ ((bool) $old_home_dishes_categories_show) ? 'checked' : '' }}
               value="1" />
        {{ trans('pagesets::sets.form.home_dishes_categories_show') }}
    </label><br>
</div>

<div class="checkbox">
    <?php $old_home_dishes_menu_show = $sets->home_dishes_menu_show ?>
    <label for="home_dishes_menu_show">
        <input id="home_dishes_menu_show"
               name="home_dishes_menu_show"
               type="checkbox"
               class="flat-blue"
               {{ ((bool) $old_home_dishes_menu_show) ? 'checked' : '' }}
               value="1" />
        {{ trans('pagesets::sets.form.home_dishes_menu_show') }}
    </label><br>
</div>

<div class="checkbox">
    <?php $old_home_dishes_show = $sets->home_dishes_show ?>
    <label for="home_dishes_show">
        <input id="home_dishes_show"
               name="home_dishes_show"
               type="checkbox"
               class="flat-blue"
               {{ ((bool) $old_home_dishes_show) ? 'checked' : '' }}
               value="1" />
        {{ trans('pagesets::sets.form.home_dishes_show') }}
    </label><br>
</div>

<div class="checkbox">
    <?php $old_home_gallery_show = $sets->home_gallery_show ?>
    <label for="home_gallery_show">
        <input id="home_gallery_show"
               name="home_gallery_show"
               type="checkbox"
               class="flat-blue"
               {{ ((bool) $old_home_gallery_show) ? 'checked' : '' }}
               value="1" />
        {{ trans('pagesets::sets.form.home_gallery_show') }}
    </label><br>
</div>

<div class="checkbox">
    <?php $old_home_feedbacks_show = $sets->home_feedbacks_show ?>
    <label for="home_feedbacks_show">
        <input id="home_feedbacks_show"
               name="home_feedbacks_show"
               type="checkbox"
               class="flat-blue"
               {{ ((bool) $old_home_feedbacks_show) ? 'checked' : '' }}
               value="1" />
        {{ trans('pagesets::sets.form.home_feedbacks_show') }}
    </label><br>
</div>

<div class="checkbox">
    <?php $old_home_addition_content_show = $sets->home_addition_content_show ?>
    <label for="home_addition_content_show">
        <input id="home_addition_content_show"
               name="home_addition_content_show"
               type="checkbox"
               class="flat-blue"
               {{ ((bool) $old_home_addition_content_show) ? 'checked' : '' }}
               value="1" />
        {{ trans('pagesets::sets.form.home_addition_content_show') }}
    </label><br>
</div>


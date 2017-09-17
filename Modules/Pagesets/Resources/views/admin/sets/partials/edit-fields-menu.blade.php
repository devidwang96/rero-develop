<div class='form-group{{ $errors->has("$lang.menu_title") ? ' has-error' : '' }}'>
    <?php $old_menu_title = isset($sets->translate($lang)->menu_title) ? $sets->translate($lang)->menu_title : ''; ?>
    {!! Form::label("{$lang}[menu_title]", trans('pagesets::sets.form.menu_title')) !!}
    {!! Form::text("{$lang}[menu_title]", old("$lang.[menu_title]", $old_menu_title), ['class' => 'form-control', 'placeholder' => trans('pagesets::sets.form.menu_title')]) !!}
    {!! $errors->first("$lang.menu_title", '<span class="help-block">:message</span>') !!}
</div>

<?php $old_menu_meta_keywords = isset($sets->translate($lang)->menu_meta_keywords) ? $sets->translate($lang)->menu_meta_keywords : ''; ?>
@editor('menu_meta_keywords', trans('pagesets::sets.form.menu_meta_keywords'), old("{$lang}.menu_meta_keywords", $old_menu_meta_keywords), $lang)

<?php $old_menu_meta_description = isset($sets->translate($lang)->menu_meta_description) ? $sets->translate($lang)->menu_meta_description : ''; ?>
@editor('menu_meta_description', trans('pagesets::sets.form.menu_meta_description'), old("{$lang}.menu_meta_description", $old_menu_meta_description), $lang)
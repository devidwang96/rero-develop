<div class='form-group{{ $errors->has("$lang.gallery_title") ? ' has-error' : '' }}'>
    <?php $old_gallery_title = isset($sets->translate($lang)->gallery_title) ? $sets->translate($lang)->gallery_title : ''; ?>
    {!! Form::label("{$lang}[gallery_title]", trans('pagesets::sets.form.gallery_title')) !!}
    {!! Form::text("{$lang}[gallery_title]", old("$lang.[gallery_title]", $old_gallery_title), ['class' => 'form-control', 'placeholder' => trans('pagesets::sets.form.gallery_title')]) !!}
    {!! $errors->first("$lang.gallery_title", '<span class="help-block">:message</span>') !!}
</div>

<?php $old_gallery_meta_keywords = isset($sets->translate($lang)->gallery_meta_keywords) ? $sets->translate($lang)->gallery_meta_keywords : ''; ?>
@editor('gallery_meta_keywords', trans('pagesets::sets.form.gallery_meta_keywords'), old("{$lang}.gallery_meta_keywords", $old_gallery_meta_keywords), $lang)

<?php $old_gallery_meta_description = isset($sets->translate($lang)->gallery_meta_description) ? $sets->translate($lang)->gallery_meta_description : ''; ?>
@editor('gallery_meta_description', trans('pagesets::sets.form.gallery_meta_description'), old("{$lang}.gallery_meta_description", $old_gallery_meta_description), $lang)
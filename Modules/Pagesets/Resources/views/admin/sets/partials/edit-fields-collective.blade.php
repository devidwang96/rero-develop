<div class='form-group{{ $errors->has("$lang.collective_title") ? ' has-error' : '' }}'>
    <?php $old_collective_title = isset($sets->translate($lang)->collective_title) ? $sets->translate($lang)->collective_title : ''; ?>
    {!! Form::label("{$lang}[collective_title]", trans('pagesets::sets.form.collective_title')) !!}
    {!! Form::text("{$lang}[collective_title]", old("$lang.[collective_title]", $old_collective_title), ['class' => 'form-control', 'placeholder' => trans('pagesets::sets.form.collective_title')]) !!}
    {!! $errors->first("$lang.collective_title", '<span class="help-block">:message</span>') !!}
</div>

<?php $old_collective_meta_keywords = isset($sets->translate($lang)->collective_meta_keywords) ? $sets->translate($lang)->collective_meta_keywords : ''; ?>
@editor('collective_meta_keywords', trans('pagesets::sets.form.collective_meta_keywords'), old("{$lang}.collective_meta_keywords", $old_collective_meta_keywords), $lang)

<?php $old_collective_meta_description = isset($sets->translate($lang)->collective_meta_description) ? $sets->translate($lang)->collective_meta_description : ''; ?>
@editor('collective_meta_description', trans('pagesets::sets.form.collective_meta_description'), old("{$lang}.collective_meta_description", $old_collective_meta_description), $lang)
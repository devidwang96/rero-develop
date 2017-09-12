<div class='form-group{{ $errors->has("$lang.news_title") ? ' has-error' : '' }}'>
    <?php $old_news_title = isset($sets->translate($lang)->news_title) ? $sets->translate($lang)->news_title : ''; ?>
    {!! Form::label("{$lang}[news_title]", trans('pagesets::sets.form.news_title')) !!}
    {!! Form::text("{$lang}[news_title]", old("$lang.[news_title]", $old_news_title), ['class' => 'form-control', 'placeholder' => trans('pagesets::sets.form.news_title')]) !!}
    {!! $errors->first("$lang.news_title", '<span class="help-block">:message</span>') !!}
</div>

<?php $old_news_meta_keywords = isset($sets->translate($lang)->news_meta_keywords) ? $sets->translate($lang)->news_meta_keywords : ''; ?>
@editor('news_meta_keywords', trans('pagesets::sets.form.news_meta_keywords'), old("{$lang}.news_meta_keywords", $old_news_meta_keywords), $lang)

<?php $old_news_meta_description = isset($sets->translate($lang)->news_meta_description) ? $sets->translate($lang)->news_meta_description : ''; ?>
@editor('news_meta_description', trans('pagesets::sets.form.news_meta_description'), old("{$lang}.news_meta_description", $old_news_meta_description), $lang)
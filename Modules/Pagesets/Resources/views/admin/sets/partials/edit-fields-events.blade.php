<div class='form-group{{ $errors->has("$lang.events_title") ? ' has-error' : '' }}'>
    <?php $old_events_title = isset($sets->translate($lang)->events_title) ? $sets->translate($lang)->events_title : ''; ?>
    {!! Form::label("{$lang}[events_title]", trans('pagesets::sets.form.events_title')) !!}
    {!! Form::text("{$lang}[events_title]", old("$lang.[events_title]", $old_events_title), ['class' => 'form-control', 'placeholder' => trans('pagesets::sets.form.events_title')]) !!}
    {!! $errors->first("$lang.events_title", '<span class="help-block">:message</span>') !!}
</div>

<?php $old_events_meta_keywords = isset($sets->translate($lang)->events_meta_keywords) ? $sets->translate($lang)->events_meta_keywords : ''; ?>
@editor('events_meta_keywords', trans('pagesets::sets.form.events_meta_keywords'), old("{$lang}.events_meta_keywords", $old_events_meta_keywords), $lang)

<?php $old_events_meta_description = isset($sets->translate($lang)->events_meta_description) ? $sets->translate($lang)->events_meta_description : ''; ?>
@editor('events_meta_description', trans('pagesets::sets.form.events_meta_description'), old("{$lang}.events_meta_description", $old_events_meta_description), $lang)
<div class="box-body">
    <div class='form-group{{ $errors->has("$lang.home_title") ? ' has-error' : '' }}'>
        <?php $old_home_title = isset($sets->translate($lang)->home_title) ? $sets->translate($lang)->home_title : ''; ?>
        {!! Form::label("{$lang}[home_title]", trans('pagesets::sets.form.home_title')) !!}
        {!! Form::text("{$lang}[home_title]", old("$lang.[home_title]", $old_home_title), ['class' => 'form-control', 'placeholder' => trans('pagesets::sets.form.home_title')]) !!}
        {!! $errors->first("$lang.home_title", '<span class="help-block">:message</span>') !!}
    </div>

    <?php $old_home_meta_keywords = isset($sets->translate($lang)->home_meta_keywords) ? $sets->translate($lang)->home_meta_keywords : ''; ?>
    @editor('home_meta_keywords', trans('pagesets::sets.form.home_meta_keywords'), old("{$lang}.home_meta_keywords", $old_home_meta_keywords), $lang)

    <?php $old_home_meta_description = isset($sets->translate($lang)->home_meta_description) ? $sets->translate($lang)->home_meta_description : ''; ?>
    @editor('home_meta_description', trans('pagesets::sets.form.home_meta_description'), old("{$lang}.home_meta_description", $old_home_meta_description), $lang)

    <div class='form-group{{ $errors->has("$lang.home_add_content_title") ? ' has-error' : '' }}'>
        <?php $old_home_add_content_title = isset($sets->translate($lang)->home_add_content_title) ? $sets->translate($lang)->home_add_content_title : ''; ?>
        {!! Form::label("{$lang}[home_add_content_title]", trans('pagesets::sets.form.home_add_content_title')) !!}
        {!! Form::text("{$lang}[home_add_content_title]", old("$lang.[home_add_content_title]", $old_home_add_content_title), ['class' => 'form-control', 'placeholder' => trans('pagesets::sets.form.home_add_content_title')]) !!}
        {!! $errors->first("$lang.home_add_content_title", '<span class="help-block">:message</span>') !!}
    </div>

    <?php $old_home_add_content = isset($sets->translate($lang)->home_add_content) ? $sets->translate($lang)->home_add_content : ''; ?>
    @editor('home_add_content', trans('pagesets::sets.form.home_add_content'), old("{$lang}.home_add_content", $old_home_add_content), $lang)



</div>

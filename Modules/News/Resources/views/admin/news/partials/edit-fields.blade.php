<div class="box-body">
    <div class='form-group{{ $errors->has("$lang.title") ? ' has-error' : '' }}'>
        <?php $oldTitle = isset($news->translate($lang)->title) ? $news->translate($lang)->title : ''; ?>
        {!! Form::label("{$lang}[title]", trans('news::news.form.title')) !!}
        {!! Form::text("{$lang}[title]", old("$lang.title", $oldTitle), ['class' => 'form-control', 'placeholder' => trans('news::news.form.title')]) !!}
        {!! $errors->first("$lang.title", '<span class="help-block">:message</span>') !!}
    </div>

    <div class='form-group{{ $errors->has("$lang.teaser") ? ' has-error' : '' }}'>
        <?php $oldContain = isset($news->translate($lang)->teaser) ? $news->translate($lang)->teaser : ''; ?>
        {!! Form::label("{$lang}[teaser]", trans('news::news.form.teaser')) !!}
        {!! Form::text("{$lang}[teaser]", old("$lang.teaser", $oldContain), ['class' => 'form-control', 'placeholder' => trans('news::news.form.teaser')]) !!}
        {!! $errors->first("$lang.teaser", '<span class="help-block">:message</span>') !!}
    </div>
    <?php $old = isset($news->translate($lang)->full_content) ? $news->translate($lang)->full_content : ''; ?>
    @editor('full_content', trans('blog::post.form.full_content'), old("$lang.full_content", $old), $lang)
</div>



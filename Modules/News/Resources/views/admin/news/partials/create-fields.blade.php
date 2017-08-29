<div class="box-body">
    {{  dump($errors)  }}
    <div class='form-group{{ $errors->has("$lang.title") ? ' has-error' : '' }}'>

        {!! Form::label("{$lang}[title]", trans('news::news.form.title')) !!}
        {!! Form::text("{$lang}[title]", old("$lang.title"), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('news::news.form.title')]) !!}
        {!! $errors->first("$lang.title", '<span class="help-block">:message</span>') !!}
    </div>

    <div class='form-group{{ $errors->has("$lang.teaser") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[teaser]", trans('news::news.form.teaser')) !!}
        {!! Form::text("{$lang}[teaser]", old("$lang.teaser"), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('news::news.form.teaser')]) !!}
        {!! $errors->first("$lang.teaser", '<span class="help-block">:message</span>') !!}
    </div>
    @editor('full_content', trans('news::news.form.full_content'), old("{$lang}.full_content"), $lang)
</div>



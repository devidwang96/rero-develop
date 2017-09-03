
<div class="box-body">
    <?php $oldTitle = isset($dishcategory->translate($lang)->title) ? $dishcategory->translate($lang)->title : ''; ?>
    <div class='form-group{{ $errors->has("$lang.title") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[title]", trans('dishes::dishcategories.form.title')) !!}
        {!! Form::text("{$lang}[title]", old("$lang.[title]", $oldTitle), ['class' => 'form-control', 'placeholder' => trans('dishes::dishcategories.form.title')]) !!}
        {!! $errors->first("$lang.title", '<span class="help-block">:message</span>') !!}

    </div>
        <?php $oldTeaser = isset($dishcategory->translate($lang)->teaser) ? $dishcategory->translate($lang)->title : ''; ?>
    <div class='form-group{{ $errors->has("$lang.teaser") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[teaser]", trans('dishes::dishcategories.form.teaser')) !!}
        {!! Form::text("{$lang}[teaser]", old("$lang.[teaser]", $oldTeaser), ['class' => 'form-control teaser', 'placeholder' => trans('dishes::dishcategories.form.teaser')]) !!}
        {!! $errors->first("$lang.teaser", '<span class="help-block">:message</span>') !!}
    </div>
</div>

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
<div class="checkbox">
    <?php $oldStatus = $dishcategory->hasTranslation($lang) ? $dishcategory->translate($lang)->status : false ?>
    <label for="{{$lang}}[status]">
        <input id="{{$lang}}[status]"
               name="{{$lang}}[status]"
               type="checkbox"
               class="flat-blue"
               {{ ((bool) $oldStatus) ? 'checked' : '' }}
               value="1" />
        {{ trans('dishes::dishcategories.form.status') }}
    </label><br>
    <span class="help">({{ trans('dishes::dishcategories.form.status_help') }})</span>
</div>

<div class="checkbox">
    <?php $oldOnMain = $dishcategory->hasTranslation($lang) ? $dishcategory->translate($lang)->on_main : false ?>
    <label for="{{$lang}}[on_main]">
        <input id="{{$lang}}[on_main]"
               name="{{$lang}}[on_main]"
               type="checkbox"
               class="flat-blue"
               {{ ((bool) $oldOnMain) ? 'checked' : '' }}
               value="1" />
        {{ trans('dishes::dishcategories.form.on_main') }}
    </label><br>
    <span class="help">({{ trans('dishes::dishcategories.form.on_main_help') }})</span>
</div>

<style>
    .checkbox{
        border-bottom:1px solid rgba(0,0,0,0.3);
        padding:15px;
        margin-bottom:15px;
    }
    .checkbox .help{
        font-size:14px;
        color:rgba(0,0,0,0.5);
        font-style: italic;
    }
</style>
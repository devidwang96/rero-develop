<div class="box-body">
    <div class='form-group{{ $errors->has("$lang.title") ? ' has-error' : '' }}'>
        <?php $oldTitle = isset($dish->translate($lang)->title) ? $dish->translate($lang)->title : ''; ?>
        {!! Form::label("{$lang}[title]", trans('dishes::dishes.form.title')) !!}
        {!! Form::text("{$lang}[title]", old("$lang.[title]", $oldTitle), ['class' => 'form-control', 'placeholder' => trans('dishes::dishes.form.title')]) !!}
        {!! $errors->first("$lang.title", '<span class="help-block">:message</span>') !!}

    </div>
    <div class='form-group{{ $errors->has("$lang.short_contain") ? ' has-error' : '' }}'>
        <?php $oldContain = isset($dish->translate($lang)->short_contain) ? $dish->translate($lang)->short_contain : ''; ?>
        {!! Form::label("{$lang}[short_contain]", trans('dishes::dishes.form.short_contain')) !!}
        {!! Form::text("{$lang}[short_contain]", old("$lang.[short_contain]", $oldContain), ['class' => 'form-control short_contain', 'placeholder' => trans('dishes::dishes.form.short_contain')]) !!}
        {!! $errors->first("$lang.short_contain", '<span class="help-block">:message</span>') !!}
    </div>

    <?php $old = isset($dish->translate($lang)->full_description) ? $dish->translate($lang)->full_description : ''; ?>
    @editor('full_description', trans('dishes::dishes.form.full_description'), old("{$lang}.full_description", $old), $lang)
</div>

<div class="checkbox">
    <?php $oldStatus = $dish->hasTranslation($lang) ? $dish->translate($lang)->status : false ?>
    <label for="{{$lang}}[status]">
        <input id="{{$lang}}[status]"
               name="{{$lang}}[status]"
               type="checkbox"
               class="flat-blue"
               {{ ((bool) $oldStatus) ? 'checked' : '' }}
               value="1" />
        {{ trans('dishes::dishes.form.status') }}
    </label><br>
    <span class="help">({{ trans('dishes::dishes.form.status_help') }})</span>
</div>

<div class="checkbox">
    <?php $oldOnMain = $dish->hasTranslation($lang) ? $dish->translate($lang)->on_main : false ?>
    <label for="{{$lang}}[on_main]">
        <input id="{{$lang}}[on_main]"
               name="{{$lang}}[on_main]"
               type="checkbox"
               class="flat-blue"
               {{ ((bool) $oldOnMain) ? 'checked' : '' }}
               value="1" />
        {{ trans('dishes::dishes.form.on_main') }}
    </label><br>
    <span class="help">({{ trans('dishes::dishes.form.on_main_help') }})</span>
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
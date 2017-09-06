<div class="box-body">
    <div class='form-group{{ $errors->has("$lang.title") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[title]", trans('mats::mats.form.title')) !!}
        {!! Form::text("{$lang}[title]", old("$lang.[title]"), ['class' => 'form-control', 'placeholder' => trans('mats::mats.form.title')]) !!}
        {!! $errors->first("$lang.title", '<span class="help-block">:message</span>') !!}

    </div>
    <div class='form-group{{ $errors->has("$lang.short_contain") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[short_contain]", trans('mats::mats.form.short_contain')) !!}
        {!! Form::text("{$lang}[short_contain]", old("$lang.[short_contain]"), ['class' => 'form-control short_contain', 'placeholder' => trans('mats::mats.form.short_contain')]) !!}
        {!! $errors->first("$lang.short_contain", '<span class="help-block">:message</span>') !!}
    </div>

    @editor('full_description', trans('mats::mats.form.full_description'), old("{$lang}.full_description"), $lang)
</div>

<div class="checkbox">
    <label for="{{$lang}}[status]">
        <input id="{{$lang}}[status]"
               name="{{$lang}}[status]"
               type="checkbox"
               class="flat-blue"
               {{ (is_null(old("$lang.status"))) ?: 'checked' }}
               value="1" />
        {{ trans('mats::mats.form.status') }}
    </label><br>
    <span class="help">({{ trans('mats::mats.form.status_help') }})</span>
</div>

<div class="checkbox">
    <label for="{{$lang}}[on_main]">
        <input id="{{$lang}}[on_main]"
               name="{{$lang}}[on_main]"
               type="checkbox"
               class="flat-blue"
               {{ (is_null(old("$lang.on_main"))) ?: 'checked' }}
               value="1" />
        {{ trans('mats::mats.form.on_main') }}
    </label><br>
    <span class="help">({{ trans('mats::mats.form.on_main_help') }})</span>
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
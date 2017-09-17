@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('pagesets::sets.title.edit sets') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('pagesets::sets.title.edit sets') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.pagesets.sets.update', $sets->id], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#pagesets_tab1" data-toggle="tab">{{ trans('pagesets::sets.tabs.home') }}</a>
                            </li>
                            <li>
                                <a href="#pagesets_tab2" data-toggle="tab">{{ trans('pagesets::sets.tabs.news') }}</a>
                            </li>
                            <li>
                                <a href="#pagesets_tab3" data-toggle="tab">{{ trans('pagesets::sets.tabs.menu') }}</a>
                            </li>
                            <li>
                                <a href="#pagesets_tab4" data-toggle="tab">{{ trans('pagesets::sets.tabs.events') }}</a>
                            </li>
                            <li>
                                <a href="#pagesets_tab5" data-toggle="tab">{{ trans('pagesets::sets.tabs.collective') }}</a>
                            </li>
                            <li>
                                <a href="#pagesets_tab6" data-toggle="tab">{{ trans('pagesets::sets.tabs.gallery') }}</a>
                            </li>
                        </ul>
                    </div>


                    <div class="tab-content">
                        <div class="tab-pane active" id="pagesets_tab1">
                            <div class="col-md-9">
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title">{{ trans('core::core.title.translatable fields') }}</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="nav-tabs-custom">
                                            {{--@include('partials.form-tab-headers')--}}
                                            {{--==========TAB HEADERS========--}}
                                            <?php if (count(LaravelLocalization::getSupportedLocales()) > 1): ?>
                                            <ul class="nav nav-tabs">
                                                <?php $i = 0; ?>
                                                <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                                                <?php $i ++; ?>
                                                <?php $class = ''; ?>
                                                <?php foreach ($errors->getMessages() as $field => $messages): ?>
                                                    <?php if (substr($field, 0, strpos($field, ".")) == $locale) $class = 'error' ?>
                                                <?php endforeach ?>
                                                <li class="{{ App::getLocale() == $locale ? 'active' : '' }} {{ $class }}">
                                                    <a href="#hometab_{{ $i }}" data-toggle="tab">{{ trans('core::core.tab.'. strtolower($language['name'])) }}</a>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <?php endif; ?>
                                            {{--=============================--}}
                                            <div class="tab-content">
                                                <div class="tab-content">
                                                    <?php $i = 0; ?>
                                                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                                                        <?php $i++; ?>
                                                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="hometab_{{ $i }}">
                                                            @include('pagesets::admin.sets.partials.edit-fields-home', ['lang' => $locale])
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title">{{ trans('core::core.title.non translatable fields') }}</h3>
                                    </div>
                                    <div class="box-body">
                                        @include('pagesets::admin.sets.partials.edit-fields-home-no-trans')
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <p>{{ trans('pagesets::sets.form.gallery_bg') }}</p>
                                        @mediaMultiple('HomeGalleryBg', $sets)
                                    </div>
                                </div>

                                <div class="box box-primary">
                                    <div class="box-body">
                                        <p>{{ trans('pagesets::sets.form.gallery_about') }}</p>
                                        @mediaMultiple('HomeGalleryAbout', $sets)
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane" id="pagesets_tab2">
                            <div class="col-md-9">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <div class="nav-tabs-custom">
                                            {{--==========TAB HEADERS========--}}
                                            <?php if (count(LaravelLocalization::getSupportedLocales()) > 1): ?>
                                            <ul class="nav nav-tabs">
                                                <?php $i = 0; ?>
                                                <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                                                <?php $i ++; ?>
                                                <?php $class = ''; ?>
                                                <?php foreach ($errors->getMessages() as $field => $messages): ?>
                                                    <?php if (substr($field, 0, strpos($field, ".")) == $locale) $class = 'error' ?>
                                                <?php endforeach ?>
                                                <li class="{{ App::getLocale() == $locale ? 'active' : '' }} {{ $class }}">
                                                    <a href="#newstab_{{ $i }}" data-toggle="tab">{{ trans('core::core.tab.'. strtolower($language['name'])) }}</a>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <?php endif; ?>
                                            {{--=============================--}}
                                            <div class="tab-content">
                                                <div class="tab-content">
                                                    <?php $i = 0; ?>
                                                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                                                        <?php $i++; ?>
                                                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="newstab_{{ $i }}">
                                                            @include('pagesets::admin.sets.partials.edit-fields-news', ['lang' => $locale])
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <p>{{ trans('pagesets::sets.form.gallery_bg') }}</p>
                                        @mediaMultiple('NewsGalleryBg', $sets)
                                    </div>
                                </div>
                            </div>


                        </div>


                        <div class="tab-pane" id="pagesets_tab3">
                            <div class="col-md-9">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <div class="nav-tabs-custom">
                                            {{--==========TAB HEADERS========--}}
                                            <?php if (count(LaravelLocalization::getSupportedLocales()) > 1): ?>
                                            <ul class="nav nav-tabs">
                                                <?php $i = 0; ?>
                                                <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                                                <?php $i ++; ?>
                                                <?php $class = ''; ?>
                                                <?php foreach ($errors->getMessages() as $field => $messages): ?>
                                                    <?php if (substr($field, 0, strpos($field, ".")) == $locale) $class = 'error' ?>
                                                <?php endforeach ?>
                                                <li class="{{ App::getLocale() == $locale ? 'active' : '' }} {{ $class }}">
                                                    <a href="#menutab_{{ $i }}" data-toggle="tab">{{ trans('core::core.tab.'. strtolower($language['name'])) }}</a>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <?php endif; ?>
                                            {{--=============================--}}
                                            <div class="tab-content">
                                                <div class="tab-content">
                                                    <?php $i = 0; ?>
                                                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                                                        <?php $i++; ?>
                                                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="menutab_{{ $i }}">
                                                            @include('pagesets::admin.sets.partials.edit-fields-menu', ['lang' => $locale])
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <p>{{ trans('pagesets::sets.form.gallery_bg') }}</p>
                                        @mediaMultiple('MenuGalleryBg', $sets)
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane " id="pagesets_tab4">
                            <div class="col-md-9">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <div class="nav-tabs-custom">
                                            {{--==========TAB HEADERS========--}}
                                            <?php if (count(LaravelLocalization::getSupportedLocales()) > 1): ?>
                                            <ul class="nav nav-tabs">
                                                <?php $i = 0; ?>
                                                <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                                                <?php $i ++; ?>
                                                <?php $class = ''; ?>
                                                <?php foreach ($errors->getMessages() as $field => $messages): ?>
                                                    <?php if (substr($field, 0, strpos($field, ".")) == $locale) $class = 'error' ?>
                                                <?php endforeach ?>
                                                <li class="{{ App::getLocale() == $locale ? 'active' : '' }} {{ $class }}">
                                                    <a href="#eventstab_{{ $i }}" data-toggle="tab">{{ trans('core::core.tab.'. strtolower($language['name'])) }}</a>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <?php endif; ?>
                                            {{--=============================--}}
                                            <div class="tab-content">
                                                <div class="tab-content">
                                                    <?php $i = 0; ?>
                                                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                                                        <?php $i++; ?>
                                                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="eventstab_{{ $i }}">
                                                            @include('pagesets::admin.sets.partials.edit-fields-events', ['lang' => $locale])
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <p>{{ trans('pagesets::sets.form.gallery_bg') }}</p>
                                        @mediaMultiple('EventsGalleryBg', $sets)
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane " id="pagesets_tab5">
                            <div class="col-md-9">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <div class="nav-tabs-custom">
                                            {{--==========TAB HEADERS========--}}
                                            <?php if (count(LaravelLocalization::getSupportedLocales()) > 1): ?>
                                            <ul class="nav nav-tabs">
                                                <?php $i = 0; ?>
                                                <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                                                <?php $i ++; ?>
                                                <?php $class = ''; ?>
                                                <?php foreach ($errors->getMessages() as $field => $messages): ?>
                                                    <?php if (substr($field, 0, strpos($field, ".")) == $locale) $class = 'error' ?>
                                                <?php endforeach ?>
                                                <li class="{{ App::getLocale() == $locale ? 'active' : '' }} {{ $class }}">
                                                    <a href="#collectivetab_{{ $i }}" data-toggle="tab">{{ trans('core::core.tab.'. strtolower($language['name'])) }}</a>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <?php endif; ?>
                                            {{--=============================--}}
                                            <div class="tab-content">
                                                <div class="tab-content">
                                                    <?php $i = 0; ?>
                                                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                                                        <?php $i++; ?>
                                                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="collectivetab_{{ $i }}">
                                                            @include('pagesets::admin.sets.partials.edit-fields-collective', ['lang' => $locale])
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <p>{{ trans('pagesets::sets.form.gallery_bg') }}</p>
                                        @mediaMultiple('CollectiveGalleryBg', $sets)
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane " id="pagesets_tab6">
                            <div class="col-md-9">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <div class="nav-tabs-custom">
                                            {{--==========TAB HEADERS========--}}
                                            <?php if (count(LaravelLocalization::getSupportedLocales()) > 1): ?>
                                            <ul class="nav nav-tabs">
                                                <?php $i = 0; ?>
                                                <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                                                <?php $i ++; ?>
                                                <?php $class = ''; ?>
                                                <?php foreach ($errors->getMessages() as $field => $messages): ?>
                                                    <?php if (substr($field, 0, strpos($field, ".")) == $locale) $class = 'error' ?>
                                                <?php endforeach ?>
                                                <li class="{{ App::getLocale() == $locale ? 'active' : '' }} {{ $class }}">
                                                    <a href="#gallerytab_{{ $i }}" data-toggle="tab">{{ trans('core::core.tab.'. strtolower($language['name'])) }}</a>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <?php endif; ?>
                                            {{--=============================--}}
                                            <div class="tab-content">
                                                <div class="tab-content">
                                                    <?php $i = 0; ?>
                                                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                                                        <?php $i++; ?>
                                                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="gallerytab_{{ $i }}">
                                                            @include('pagesets::admin.sets.partials.edit-fields-gallery', ['lang' => $locale])
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <p>{{ trans('pagesets::sets.form.gallery_bg') }}</p>
                                        @mediaMultiple('galleryGalleryBg', $sets)
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
                <a class="btn btn-danger pull-right btn-flat" href="/{{$locale}}/backend"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

    <style>
        li.error {
            border-top-color: #dd4b39 !important;
        }
    </style>
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "/{{$locale}}/backend" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });

        $('input[type="checkbox"]').on('ifChecked', function(){
            $(this).parent().find('input[type=hidden]').remove();
        });

        $('input[type="checkbox"]').on('ifUnchecked', function(){
            var name = $(this).attr('name'),
                input = '<input type="hidden" name="' + name + '" value="0" />';
            $(this).parent().append(input);
        });
    </script>


@endpush

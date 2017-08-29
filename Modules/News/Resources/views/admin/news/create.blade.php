@extends('layouts.master')

@section('styles')
@stop

@section('content-header')
    <h1>
        {{ trans('news::news.title.create news') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ URL::route('admin.news.news.index') }}">{{ trans('news::news.title.news') }}</a></li>
        <li class="active">{{ trans('news::news.title.create news') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.news.news.store'], 'method' => 'post']) !!}
    <div class="row">



        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ trans('core::core.title.translatable fields') }}</h3>
                </div>
                <div class="box-body">
                    <div class="nav-tabs-custom">
                        @include('partials.form-tab-headers', ['fields' => ['title', 'slug']])
                        <div class="tab-content">
                            <?php $i = 0; ?>
                            <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                            <?php $i++; ?>
                            <div class="tab-pane {{ App::getLocale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                                @include('news::admin.news.partials.create-fields', ['lang' => $locale])
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                <a class="btn btn-danger pull-right btn-flat" href="{{ URL::route('admin.news.news.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
            </div>
        </div>


        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label("category", 'Category:') !!}
                        <select name="category_id" id="category" class="form-control">
                            <?php foreach ($categories as $category): ?>
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    @mediaMultiple('NewsGallery')

                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index', ['name' => 'news']) }}</dd>
    </dl>
@stop

@section('scripts')
    <script src="{{ Module::asset('news:js/MySelectize.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            //CKEDITOR.replaceAll(function( textarea, config ) {
            //  config.language = '<?= App::getLocale() ?>';
            //} );
        });

        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.news.news.index') ?>" }
                ]
            });
            $.ajaxSetup({
                headers: { 'Authorization': 'Bearer {{ $currentUser->getFirstApiKey() }}' }
            });
        });
    </script>
@stop

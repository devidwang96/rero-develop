@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('dishes::dishes.title.create dish') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.dishes.dish.index') }}">{{ trans('dishes::dishes.title.dishes') }}</a></li>
        <li class="active">{{ trans('dishes::dishes.title.create dish') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.dishes.dish.store'], 'method' => 'post']) !!}
    <div class="row">


        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ trans('core::core.title.translatable fields') }}</h3>
                </div>
                <div class="box-body">
                    <div class="nav-tabs-custom">
                        @include('partials.form-tab-headers')
                        <div class="tab-content">
                            <?php $i = 0; ?>
                            @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                                <?php $i++; ?>
                                <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                                    @include('dishes::admin.dishes.partials.create-fields', ['lang' => $locale])
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ trans('core::core.title.non translatable fields') }}</h3>
                </div>
                <div class="box-body">
                    @include('dishes::admin.dishes.partials.create-fields-no-trans')
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                <a class="btn btn-danger pull-right btn-flat" href="{{ URL::route('admin.menu.menu.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label("category", 'Category:') !!}
                <select name="category_id" id="category" class="form-control">
                    <?php foreach ($categories as $category): ?>
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                    @mediaMultiple('DishesGallery')
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
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@push('js-stack')
<script type="text/javascript">
    $( document ).ready(function() {
        $(document).keypressAction({
            actions: [
                { key: 'b', route: "<?= route('admin.dishes.dish.index') ?>" }
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

        $('input[type="checkbox"]').on('ifChecked', function(){
            $(this).parent().find('input[type=hidden]').remove();
        });

        $('input[type="checkbox"]').on('ifUnchecked', function(){
            var name = $(this).attr('name'),
                input = '<input type="hidden" name="' + name + '" value="0" />';
            $(this).parent().append(input);
        });
    });
</script>
@endpush

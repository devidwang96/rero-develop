@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('mats::matcategories.title.create matcategory') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('mats::matcategories.title.create matcategory') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.mats.matcategory.store'], 'method' => 'post']) !!}
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
                                    @include('mats::admin.matcategories.partials.create-fields', ['lang' => $locale])
                                </div>
                            @endforeach

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                                <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.mats.matcategory.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
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
                    @include('mats::admin.matcategories.partials.create-fields-no-trans')
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body">
                    <p>{{ trans('mats::matcategories.help.select_category_type') }}</p>
                    <div class="radio">
                        <input type="radio" id="type_news" name="category_type" value="1" checked><label for="type_news">{{ trans('mats::matcategories.parents.parent_1') }}</label>
                    </div>
                    <div class="radio">
                        <input type="radio" id="type_events" name="category_type" value="2"><label for="type_events">{{ trans('mats::matcategories.parents.parent_2') }}</label>
                    </div>
                    <div class="radio">
                        <input type="radio" id="type_collective" name="category_type" value="3"><label for="type_collective">{{ trans('mats::matcategories.parents.parent_3') }}</label>
                    </div>
                    <div class="radio">
                        <input type="radio" id="type_gallery" name="category_type" value="4"><label for="type_gallery">{{ trans('mats::matcategories.parents.parent_4') }}</label>
                    </div>

                    <p>{{ trans('mats::matcategories.help.select_category_image') }}</p>
                    @mediaSingle('MatsCategory')
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
                    { key: 'b', route: "<?= route('admin.mats.matcategory.index') ?>" }
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

            $('[name="category_type"]').iCheck({
                checkboxClass: 'icheckbox_minimal',
                radioClass: 'iradio_flat-blue'
            }).on('ifChecked',function(){
//                $('.link-type-depended').hide();
//                $('.link-'+$(this).val()).fadeIn();
            });
        });
    </script>
@endpush

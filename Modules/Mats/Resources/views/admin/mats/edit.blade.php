@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('mats::mats.title.edit mat') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.mats.mat.index') }}">{{ trans('mats::mats.title.mats') }}</a></li>
        <li class="active">{{ trans('mats::mats.title.edit mat') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.mats.mat.update', $mat->id], 'method' => 'put']) !!}
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
                                    @include('mats::admin.mats.partials.edit-fields', ['lang' => $locale])
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
                    @include('mats::admin.mats.partials.edit-fields-no-trans')
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
                <a class="btn btn-danger pull-right btn-flat" href="{{ URL::route('admin.menu.menu.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
            </div>
        </div>



        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">

                        <?php $category_flag = false; ?>
                        <div class="radio parent">
                            <input <?php if($mat->mat_type == 1){$category_flag = true; echo 'checked';} ?> type="radio" id="type_news" name="mat_type" value="1"><label for="type_news">{{ trans('mats::matcategories.parents.parent_1') }}</label>
                            <div class="radio under-radio">
                                <input <?php if(($category_flag == true) && ($mat->category_id == 0 )){$category_flag = false; echo 'checked';} ?>  type="radio" id="category_id_01" name="category_id" value="0"><label for="category_id_01">{{ trans('mats::mats.form.withot_cat') }}</label>
                            </div>

                            <?php foreach ($news_categories as $category): ?>

                            <div class="radio under-radio">
                                <input <?php if(($mat->category_id == $category->id )){echo 'checked';} ?> type="radio" id="category_id_{{ $category->id }}" name="category_id" value="{{ $category->id }}"><label for="category_id_{{ $category->id }}">{{ $category->title }}</label>
                            </div>

                            <?php endforeach; ?>

                        </div>

                        <div class="radio parent">
                            <input <?php if($mat->mat_type == 2){$category_flag = true; echo 'checked';} ?> type="radio" id="type_events" name="mat_type" value="2"><label for="type_events">{{ trans('mats::matcategories.parents.parent_2') }}</label>
                            <div class="radio under-radio">
                                <input <?php if(($category_flag == true) && ($mat->category_id == 0 )){$category_flag = false; echo 'checked';} ?> type="radio" id="category_id_02" name="category_id" value="0"><label for="category_id_02">{{ trans('mats::mats.form.withot_cat') }}</label>
                            </div>
                            <?php foreach ($events_categories as $category): ?>
                            <div class="radio under-radio">
                                <input <?php if(($mat->category_id == $category->id )){echo 'checked';} ?> type="radio" id="category_id_{{ $category->id }}" name="category_id" value="{{ $category->id }}"><label for="category_id_{{ $category->id }}">{{ $category->title }}</label>
                            </div>
                            <?php endforeach; ?>

                        </div>

                        <div class="radio parent">
                            <input <?php if($mat->mat_type == 3){$category_flag = true; echo 'checked';} ?> type="radio" id="type_collective" name="mat_type" value="3"><label for="type_collective">{{ trans('mats::matcategories.parents.parent_3') }}</label>
                            <div class="radio under-radio">
                                <input <?php if(($category_flag == true) && ($mat->category_id == 0 )){$category_flag = false; echo 'checked';} ?> type="radio" id="category_id_03" name="category_id" value="0"><label for="category_id_03">{{ trans('mats::mats.form.withot_cat') }}</label>
                            </div>
                            <?php foreach ($collective_categories as $category): ?>
                            <div class="radio under-radio">
                                <input <?php if(($mat->category_id == $category->id )){echo 'checked';} ?> type="radio" id="category_id_{{ $category->id }}" name="category_id" value="{{ $category->id }}"><label for="category_id_{{ $category->id }}">{{ $category->title }}</label>
                            </div>
                            <?php endforeach; ?>

                        </div>


                        <div class="radio parent">
                            <input <?php if($mat->mat_type == 4){$category_flag = true; echo 'checked';} ?> type="radio" id="type_gallery" name="mat_type" value="4"><label for="type_gallery">{{ trans('mats::matcategories.parents.parent_4') }}</label>
                            <div class="radio under-radio">
                                <input <?php if(($category_flag == true) && ($mat->category_id == 0 )){$category_flag = false; echo 'checked';} ?> type="radio" id="category_id_04" name="category_id" value="0"><label for="category_id_04">{{ trans('mats::mats.form.withot_cat') }}</label>
                            </div>
                            <?php foreach ($gallery_categories as $category): ?>
                            <div class="radio under-radio">
                                <input <?php if(($mat->category_id == $category->id )){echo 'checked';} ?> type="radio" id="category_id_{{ $category->id }}" name="category_id" value="{{ $category->id }}"><label for="category_id_{{ $category->id }}">{{ $category->title }}</label>
                            </div>
                            <?php endforeach; ?>

                        </div>

                    </div>
                </div>

            </div>



            <div class="box box-primary">
                <div class="box-body">
                    {{ trans('mats::mats.messages.mats_image_help') }}
                    @mediaSingle('Mats', $mat)
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                    {{ trans('mats::mats.messages.mats_gallery_help') }}
                    @mediaMultiple('MatsGallery', $mat)
                </div>
            </div>
        </div>




    </div>
    {!! Form::close() !!}


    <style>
        .form-group .radio .radio.under-radio{
            margin-left: 45px;
            margin-top: 5px;
        }
        .under-radio label{
            padding-left:15px;
        }
        .radio.parent{
            margin-bottom:30px;
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
                    { key: 'b', route: "<?= route('admin.mats.mat.index') ?>" }
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





            $('.radio.parent > input').iCheck({
                checkboxClass: 'icheckbox_minimal',
                radioClass: 'iradio_flat-blue'
            }).on('ifClicked', function(){
                $('.radio.under-radio input').iCheck('uncheck');
                $(this).closest('.radio.parent').find('.radio.under-radio input').first().iCheck('check');
            });


            $('.radio.under-radio input').iCheck({
                checkboxClass: 'icheckbox_minimal',
                radioClass: 'iradio_flat-blue'
            }).on('ifClicked', function(){
                $('.radio.parent > div > input').iCheck('uncheck');
                $(this).closest('.radio.parent').find('> div > input').iCheck('check');
            });


        });
    </script>
@endpush

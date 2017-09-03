@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('feedbacks::feedback.title.edit feedback') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.feedbacks.feedback.index') }}">{{ trans('feedbacks::feedback.title.feedback') }}</a></li>
        <li class="active">{{ trans('feedbacks::feedback.title.edit feedback') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.feedbacks.feedback.update', $feedback->id], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-body">
                    <?php $old_name = isset($feedback->name) ? $feedback->name : ''; ?>
                    <div class='form-group{{ $errors->has("name") ? ' has-error' : '' }}'>
                        {!! Form::label("name", trans('feedbacks::feedback.form.name')) !!}
                        {!! Form::text("name", old("name", $old_name), ['class' => 'form-control', 'placeholder' => trans('feedbacks::feedback.form.name')]) !!}
                        {!! $errors->first("name", '<span class="help-block">:message</span>') !!}
                    </div>

                        <?php $old_email = isset($feedback->email) ? $feedback->email : ''; ?>
                    <div class='form-group{{ $errors->has("email") ? ' has-error' : '' }}'>
                        {!! Form::label("email", trans('feedbacks::feedback.form.email')) !!}
                        {!! Form::text("email", old("email", $old_email), ['class' => 'form-control', 'placeholder' => trans('feedbacks::feedback.form.email')]) !!}
                        {!! $errors->first("email", '<span class="help-block">:message</span>') !!}
                    </div>

                        <?php $old_message = isset($feedback->message) ? $feedback->message : ''; ?>
                    @editor('message', trans('dishes::dishes.form.message'), old("message", $old_message))


                        <?php $old_status = $feedback->status ?>
                    <div class="checkbox">
                        <label for="status">
                            <input id="status"
                                   name="status"
                                   type="checkbox"
                                   class="flat-blue"
                                   {{ ((bool) $old_status) ? 'checked' : '' }}
                                   value="1" />
                            {{ trans('feedbacks::feedback.form.status') }}
                        </label><br>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                    <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.feedbacks.feedback.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body">
                    {{ trans('feedbacks::feedback.messages.upload_image') }}
                    {{--@mediaSingle('Feedback')--}}
                    Загрузка изображений в разработке
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
                    { key: 'b', route: "<?= route('admin.feedbacks.feedback.index') ?>" }
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

@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('orders::orders.title.edit order') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.orders.order.index') }}">{{ trans('orders::orders.title.orders') }}</a></li>
        <li class="active">{{ trans('orders::orders.title.edit order') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.orders.order.update', $order->id], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <?php $old_name = isset($order->name) ? $order->name : ''; ?>
                    <div class='form-group{{ $errors->has("name") ? ' has-error' : '' }}'>
                        {!! Form::label("name", trans('orders::orders.form.name')) !!}
                        {!! Form::text("name", old("name", $old_name), ['class' => 'form-control', 'placeholder' => trans('orders::orders.form.name')]) !!}
                        {!! $errors->first("name", '<span class="help-block">:message</span>') !!}
                    </div>

                    <?php $old_tel = isset($order->tel) ? $order->tel : ''; ?>
                    <div class='form-group{{ $errors->has("tel") ? ' has-error' : '' }}'>
                        {!! Form::label("tel", trans('orders::orders.form.tel')) !!}
                        {!! Form::text("tel", old("tel", $old_tel), ['class' => 'form-control', 'placeholder' => trans('orders::orders.form.tel')]) !!}
                        {!! $errors->first("tel", '<span class="help-block">:message</span>') !!}
                    </div>


                    <?php $old_count = isset($order->count) ? $order->count : ''; ?>
                    <div class='form-group{{ $errors->has("count") ? ' has-error' : '' }}'>
                        {!! Form::label("count", trans('orders::orders.form.count')) !!}
                        {!! Form::text("count", old("count", $old_count), ['class' => 'form-control', 'placeholder' => trans('orders::orders.form.count')]) !!}
                        {!! $errors->first("count", '<span class="help-block">:message</span>') !!}
                    </div>

                    <?php
                        $waiting_string = trans('orders::orders.form.waiting');
                        $inprocess_string = trans('orders::orders.form.inprocess');
                        $delivered_string = trans('orders::orders.form.delivered');

                        $statuses = [
                            'waiting' =>  $waiting_string ,
                            'inprocess' =>  $inprocess_string ,
                            'delivered' =>  $delivered_string
                        ];
                    ?>


                    <div class='form-group{{ $errors->has("status") ? ' has-error' : '' }}'>
                        {!! Form::label("status", trans('order::orders.form.status')) !!}
                        {!! Form::select("status", $statuses, old("status", $order->status), ['class' => "form-control", 'placeholder' => trans('order::orders.form.status')]) !!}
                        {!! $errors->first("status", '<span class="help-block">:message</span>') !!}
                    </div>


                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                    <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.orders.order.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
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
        <dd>{{ trans('orders::orders.back to index') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.orders.order.index') ?>" }
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
    </script>
@endpush

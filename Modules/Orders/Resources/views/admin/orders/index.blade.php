@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('orders::orders.title.orders') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('orders::orders.title.orders') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    {{ trans('orders::orders.help.orders_index_help') }}
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{ trans('orders::orders.table.dish') }}</th>
                                <th>{{ trans('orders::orders.table.name') }}</th>
                                <th>{{ trans('orders::orders.table.tel') }}</th>
                                <th>{{ trans('orders::orders.table.count') }}</th>
                                <th>{{ trans('orders::orders.table.status') }}</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($orders)): ?>
                            <?php foreach ($orders as $order): ?>
                            <tr>
                                <td>
                                    <a href="{{ route('admin.orders.order.edit', [$order->id]) }}">
                                       Будет фотка
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.orders.order.edit', [$order->id]) }}">
                                        {{ $order->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.orders.order.edit', [$order->id]) }}">
                                        {{ $order->tel }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.orders.order.edit', [$order->id]) }}">
                                        {{ $order->count }}
                                    </a>
                                </td>
                                <td class="order-status status-{{$order->status}}">
                                    <a href="{{ route('admin.orders.order.edit', [$order->id]) }}">
                                        {{ trans('orders::orders.form.'.$order->status) }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.orders.order.edit', [$order->id]) }}">
                                        {{ $order->created_at }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.orders.order.edit', [$order->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.orders.order.destroy', [$order->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ trans('orders::orders.table.dish') }}</th>
                                <th>{{ trans('orders::orders.table.name') }}</th>
                                <th>{{ trans('orders::orders.table.tel') }}</th>
                                <th>{{ trans('orders::orders.table.count') }}</th>
                                <th>{{ trans('orders::orders.table.status') }}</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th>{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </tfoot>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>

    <style>
        .order-status a{
            color:#fff;
            font-weight:bold;
            font-size:18px;
        }
        .order-status.status-waiting{
           background-color:red;
        }
        .order-status.status-inprocess{
            background-color:orange;
        }
        .order-status.status-delivered{
            background-color:green;
        }
    </style>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('orders::orders.title.create order') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.orders.order.create') ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@endpush

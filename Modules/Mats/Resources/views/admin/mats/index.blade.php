@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('mats::mats.title.mats') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('mats::mats.title.mats') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.mats.mat.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('mats::mats.button.create mat') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>{{ trans('mats::mats.table.title') }}</th>
                                <th>{{ trans('mats::mats.table.short_contain') }}</th>
                                <th>{{ trans('mats::mats.table.category_title') }}</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($mats)): ?>
                            <?php foreach ($mats as $mat): ?>



                            <tr>
                                <td>
                                    <a href="{{ route('admin.mats.mat.edit', [$mat->id]) }}">
                                        {{ $mat->id }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.mats.mat.edit', [$mat->id]) }}">
                                        {{ $mat->title }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.mats.mat.edit', [$mat->id]) }}">
                                        {{ $mat->short_contain }}
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('admin.mats.mat.edit', [$mat->id]) }}">
                                        {{  $categories->where('id', $mat->category_id)->first()->title }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.mats.mat.edit', [$mat->id]) }}">
                                        {{ $mat->created_at }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.mats.mat.edit', [$mat->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.mats.mat.destroy', [$mat->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>

                            </tr>



                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>{{ trans('mats::mats.table.title') }}</th>
                                <th>{{ trans('mats::mats.table.short_contain') }}</th>
                                <th>{{ trans('mats::mats.table.category_title') }}</th>
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
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('mats::mats.title.create mat') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.mats.mat.create') ?>" }
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

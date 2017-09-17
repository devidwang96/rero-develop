


@if (Session::has('success'))
    <div id="notifications-modal" class="modal fade notification success" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Спасибо вам за выделенное время :)</h4>
                </div>
                <div class="modal-body">
                    <p> {{ Session::get('success') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button button-red" data-dismiss="modal">Закрыть</button>
                </div>
            </div>

        </div>
    </div>
@endif

@if (Session::has('error'))
    <div id="notifications-modal" class="modal fade notification error" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Произошла ошибка :(</h4>
                </div>
                <div class="modal-body">
                    <p> {{ Session::get('error') }} </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>

        </div>
    </div>
@endif

@if (Session::has('warning'))
    <div id="notifications-modal" class="modal fade notification warning" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Внимание!</h4>
                </div>
                <div class="modal-body">
                    <p> {{ Session::get('warning') }} </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
@endif



@if (Session::has('flash_notification'))
    @if (Session::has('flash_notification.overlay'))
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">iTheatre Collaborative</h4>
                    </div>
                    <div class="modal-body">
                        {{ Session::get('flash_notification.message') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    @elseif (Session::has('flash_notification.message'))
        <div class="alert alert-{{ Session::get('flash_notification.level') }}" style="margin-bottom: 0;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('flash_notification.message') }}
        </div>
    @endif
@endif

@if (Session::has('errors'))
    <div class="alert alert-danger" style="margin-bottom: 0;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ $errors->first() }}
    </div>
@endif
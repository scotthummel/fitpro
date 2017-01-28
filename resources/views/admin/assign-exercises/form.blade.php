<form action="/admin/assign-exercises" method="POST">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="user_id">Client</label>
        <input type="text" name="user" id="user" class="form-control" placeholder="Start typing to select a client by name or email"/>
        <div id="user-id"></div>
    </div>

    <div class="form-group">
        <label for="user_id">Exercise</label>
        <input type="text" name="exercise" id="exercise" class="form-control" placeholder="Start typing to select an exercise"/>
        <div id="exercise-id"></div>
    </div>
</form>

@section('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $('#user').autocomplete({
                source: '/users/search',
                minLength: 2,
                select: function(e, ui) {
                    $('#user-id').html('<input type="hidden" name="user_id" value="' + ui.item.id + '" />');
                }
            });

            $('#exercise').autocomplete({
                source: '/exercises/search',
                minLength: 2,
                select: function(e, ui) {
                    $('#exercise-id').html('<input type="hidden" name="exercise_id" value="' + ui.item.id + '" />');
                }
            });
        });
    </script>
@endsection
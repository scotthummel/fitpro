<form action="{{ (!empty($muscle)) ? '/admin/muscles/' . $muscle->id : '/admin/muscles'}} " method="POST">
    {{ csrf_field() }}

    @if (!empty($muscle))
        {{ method_field('PUT') }}
    @endif

    <div class="form-group{{ $errors->has('body_part_id') ? ' has-error' : '' }}">
        <label for="body_part_id">Body Part</label>
        <select name="body_part_id" class="form-control" id="body_part_id">
            <option value="">Select One...</option>
            @foreach($bodyParts as $part)
                <option value="{{ $part->id }}" {{ (!empty($muscle) && $muscle->body_part_id == $part->id) ? 'selected="SELECTED"' : '' }}>{{ $part->body_part }}</option>
            @endforeach
        </select>

        @if ($errors->has('muscle_name'))
            <span class="help-block error">
                <strong>{{ $errors->first('muscle_name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('muscle_name') ? ' has-error' : '' }}">
        <label for="muscle_name">Muscle Name</label>
        <input type="text" class="form-control" name="muscle_name" id="muscle_name" value="{{ old('muscle_name', (!empty($muscle)) ? $muscle->muscle_name : '') }}" />

        @if ($errors->has('muscle_name'))
            <span class="help-block error">
                <strong>{{ $errors->first('muscle_name') }}</strong>
            </span>
        @endif
    </div>

    <div class="checkbox">
        <label><input type="checkbox" value="1" {{ (empty($muscle) || (!empty($muscle) && $muscle->active == 1)) ? 'checked="CHECKED"': ''}}> Active?</label>
    </div>

    <button type="submit" class="btn btn-primary pull-right">{{ (!empty($muscle)) ? 'Update' : 'Add' }}</button>
</form>
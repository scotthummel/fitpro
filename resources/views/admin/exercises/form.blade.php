<form action="{{ (!empty($exercise)) ? '/admin/exercises/' . $exercise->id : '/admin/exercises'}} " method="POST">
    {{ csrf_field() }}

    @if (!empty($exercise))
        {{ method_field('PUT') }}
    @endif

    <div class="form-group{{ $errors->has('body_part_id') ? ' has-error' : '' }}">
        <label for="body_part_id">Body Part</label>
        <select name="body_part_id" class="form-control" id="body_part_id">
            <option value="">Select One...</option>
            @foreach($bodyParts as $part)
                <option value="{{ $part->id }}" {{ (!empty($exercise) && $exercise->body_part_id == $part->id) ? 'selected="SELECTED"' : '' }}>{{ $part->body_part }}</option>
            @endforeach
        </select>

        @if ($errors->has('body_part_id'))
            <span class="help-block error">
                <strong>{{ $errors->first('body_part_id') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
        <label for="category_id">Exercise Category</label>
        <select name="category_id" class="form-control" id="category_id">
            <option value="">Select One...</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ (!empty($exercise) && $exercise->category_id == $category->id) ? 'selected="SELECTED"' : '' }}>{{ $category->category_name }}</option>
            @endforeach
        </select>

        @if ($errors->has('category_id'))
            <span class="help-block error">
                <strong>{{ $errors->first('category_id') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('exercise_name') ? ' has-error' : '' }}">
        <label for="muscle_name">Exercise Name</label>
        <input type="text" class="form-control" name="exercise_name" id="exercise_name" value="{{ old('exercise_name', (!empty($exercise)) ? $exercise->exercise_name : '') }}" />

        @if ($errors->has('exercise_name'))
            <span class="help-block error">
                <strong>{{ $errors->first('exercise_name') }}</strong>
            </span>
        @endif
    </div>

    <div class="checkbox">
        <label><input type="checkbox" value="1" {{ (empty($exercise) || (!empty($exercise) && $exercise->active == 1)) ? 'checked="CHECKED"': ''}}> Active?</label>
    </div>

    <button type="submit" class="btn btn-primary pull-right">{{ (!empty($exercise)) ? 'Update' : 'Add' }}</button>
</form>
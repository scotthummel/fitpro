<form action="{{ (!empty($bodyPart)) ? '/admin/body-parts/' . $bodyPart->id : '/admin/body-parts'}} " method="POST">
    {{ csrf_field() }}

    @if (!empty($bodyPart))
        {{ method_field('PUT') }}
    @endif

    <div class="form-group{{ $errors->has('body_part') ? ' has-error' : '' }}">
        <label for="body_part">Body Part Name</label>
        <input type="text" class="form-control" name="body_part" id="body_part" value="{{ old('body_part', (!empty($bodyPart)) ? $bodyPart->body_part : '') }}" />

        @if ($errors->has('body_part'))
            <span class="help-block error">
                <strong>{{ $errors->first('body_part') }}</strong>
            </span>
        @endif
    </div>

    <div class="checkbox">
        <label><input type="checkbox" value="1" {{ (empty($bodyPart) || (!empty($bodyPart) && $bodyPart->active == 1)) ? 'checked="CHECKED"': ''}}> Active?</label>
    </div>

    <button type="submit" class="btn btn-primary pull-right">{{ (!empty($bodyPart)) ? 'Update' : 'Add' }}</button>
</form>
<form action="{{ (!empty($category)) ? '/admin/exercise-categories/' . $category->id : '/admin/exercise-categories'}} " method="POST">
    {{ csrf_field() }}

    @if (!empty($category))
        {{ method_field('PUT') }}
    @endif

    <div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }}">
        <label for="category_name">Category Name</label>
        <input type="text" class="form-control" name="category_name" id="category_name" value="{{ old('category_name', (!empty($category)) ? $category->category_name : '') }}" />

        @if ($errors->has('category_name'))
            <span class="help-block error">
                <strong>{{ $errors->first('category_name') }}</strong>
            </span>
        @endif
    </div>

    <div class="checkbox">
        <label><input type="checkbox" value="1" name="active" {{ (empty($category) || (!empty($category) && $category->active == 1)) ? 'checked="CHECKED"': ''}}> Active?</label>
    </div>

    <button type="submit" class="btn btn-primary pull-right">{{ (!empty($category)) ? 'Update' : 'Add' }}</button>
</form>
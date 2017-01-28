@extends('layouts.app')

@section('page_title', 'Exercise Categories')

@section('content')

    <a href="/admin/exercise-categories/create" class="btn btn-primary pull-right">Add Exercise Category</a><br /><br />

    <div class="panel panel-primary">
        <div class="panel-heading">Exercise Categories</div>
        <div class="panel-body">

            @if (count($categories))

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th></th>
                            <th>Category</th>
                            <th>Active</th>
                        </tr>

                        @foreach($categories as $category)

                            <tr>
                                <td>
                                    <a href="/admin/exercise-categories/{{ $category->id }}/edit">Edit</a> |
                                    <form action="/admin/exercise-categories/{{ $category->id }}" method="POST" class="delete" data-type="exercise category">
                                        {{ csrf_field() }}

                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit">Del</button>
                                    </form>
                                </td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ (!empty($category->active)) ? 'Active' : 'Inactive' }}</td>
                            </tr>

                        @endforeach

                    </table>
                </div>

            @else

                <p>There are no exercise categories.</p>

            @endif


        </div>
    </div>

@endsection
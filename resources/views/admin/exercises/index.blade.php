@extends('layouts.app')

@section('page_title', 'Exercises')

@section('content')

    <a href="/admin/exercises/create" class="btn btn-primary pull-right">Add Exercise</a><br /><br />

    <div class="panel panel-primary">
        <div class="panel-heading">Exercises</div>
        <div class="panel-body">

            @if (count($exercises))

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th></th>
                            <th>Body Part</th>
                            <th>Exercise</th>
                            <th>Active</th>
                        </tr>

                        @foreach($exercises as $exercise)

                            <tr>
                                <td>
                                    <a href="/admin/exercises/{{ $exercise->id }}/edit">Edit</a> |
                                    <form action="/admin/exercises/{{ $exercise->id }}" method="POST" class="delete" data-type="exercise">
                                        {{ csrf_field() }}

                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit">Del</button>
                                    </form>
                                </td>
                                <td>{{ $exercise->partOfBody->body_part }}</td>
                                <td>{{ $exercise->exercise_name }}</td>
                                <td>{{ (!empty($exercise->active)) ? 'Active' : 'Inactive' }}</td>
                            </tr>

                        @endforeach

                    </table>

                    {!! $exercises->render() !!}
                </div>

            @else

                <p>There are no exercises.</p>

            @endif


        </div>
    </div>

@endsection
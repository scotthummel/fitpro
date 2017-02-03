@extends('layouts.app')

@section('page_title', 'Muscles')

@section('content')

    <a href="/admin/muscles/create" class="btn btn-primary pull-right">Add Muscle</a><br /><br />

    <div class="panel panel-primary">
        <div class="panel-heading">Muscles</div>
        <div class="panel-body">

            @if (count($muscles))

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th></th>
                            <th>Body Part</th>
                            <th>Muscle</th>
                            <th>Active</th>
                        </tr>

                        @foreach($muscles as $muscle)

                            <tr>
                                <td>
                                    <a href="/admin/muscles/{{ $muscle->id }}/edit">Edit</a> |
                                    <form action="/admin/muscles/{{ $muscle->id }}" method="POST" class="delete" data-type="muscle">
                                        {{ csrf_field() }}

                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit">Del</button>
                                    </form>
                                </td>
                                <td>{{ (!empty( $muscle->partOfBody)) ? $muscle->partOfBody->body_part : 'No body part' }}</td>
                                <td>{{ $muscle->muscle_name }}</td>
                                <td>{{ (!empty($muscle->active)) ? 'Active' : 'Inactive' }}</td>
                            </tr>

                        @endforeach

                    </table>
                </div>

            @else

                <p>There are no muscles.</p>

            @endif


        </div>
    </div>

@endsection
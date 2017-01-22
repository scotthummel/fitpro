@extends('layouts.app')

@section('page_title', 'Body Parts')

@section('content')

    <a href="/admin/body-parts/create" class="btn btn-primary pull-right">Add Body Part</a><br /><br />

    <div class="panel panel-primary">
        <div class="panel-heading">Body Parts</div>
        <div class="panel-body">

            @if (count($bodyParts))

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th></th>
                            <th>Body Part</th>
                            <th>Active</th>
                        </tr>

                        @foreach($bodyParts as $part)

                            <tr>
                                <td>
                                    <a href="/admin/body-parts/{{ $part->id }}/edit">Edit</a> |
                                    <form action="/admin/body-parts/{{ $part->id }}" method="POST" class="delete" data-type="body part">
                                        {{ csrf_field() }}

                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit">Del</button>
                                    </form>
                                </td>
                                <td>{{ $part->body_part }}</td>
                                <td>{{ (!empty($part->active)) ? 'Active' : 'Inactive' }}</td>
                            </tr>

                        @endforeach

                    </table>
                </div>

            @else

                <p>There are no body parts.</p>

            @endif


        </div>
    </div>

@endsection
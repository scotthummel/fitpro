@extends('layouts.app')

@section('page_title', 'Add Muscle')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">Add Muscle</div>
        <div class="panel-body">

            @include('admin.muscles.form')

        </div>
    </div>

@endsection
@extends('layouts.app')

@section('page_title', 'Add Exercise')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">Add Exercise</div>
        <div class="panel-body">

            @include('admin.exercises.form')

        </div>
    </div>

@endsection
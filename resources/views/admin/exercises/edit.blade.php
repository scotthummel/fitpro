@extends('layouts.app')

@section('page_title', $exercise->exercise_name , ' :: Edit Exercise')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">Edit Muscle: {{ $exercise->exercise_name }}</div>
        <div class="panel-body">

            @include('admin.exercises.form')

        </div>
    </div>

@endsection
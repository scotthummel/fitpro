@extends('layouts.app')

@section('page_title', 'Add Exercise Category')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">Add Exercise Category</div>
        <div class="panel-body">

            @include('admin.exercise-categories.form')

        </div>
    </div>

@endsection
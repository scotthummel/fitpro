@extends('layouts.app')

@section('page_title', $category->category_name . ' :: Edit Exercise Category')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">Add Exercise Category: {{ $category->category_name }}</div>
        <div class="panel-body">

            @include('admin.exercise-categories.form')

        </div>
    </div>

@endsection
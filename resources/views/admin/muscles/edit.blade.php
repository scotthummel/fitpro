@extends('layouts.app')

@section('page_title', $muscle->muscle_name , ' :: Edit Muscle')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">Edit Muscle: {{  $muscle->muscle_name }}</div>
        <div class="panel-body">

            @include('admin.muscles.form')

        </div>
    </div>

@endsection
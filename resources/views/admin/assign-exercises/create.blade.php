@extends('layouts.app')

@section('page_title', 'Assign Exercise')

@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">Assign Exercise</div>
        <div class="panel-body">

            @include('admin.assign-exercises.form')

        </div>
    </div>

@endsection
@extends('layouts.app')

@section('page_title', 'Add Body Part')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">Add Body Part</div>
        <div class="panel-body">

            @include('admin.body-parts.form')

        </div>
    </div>

@endsection
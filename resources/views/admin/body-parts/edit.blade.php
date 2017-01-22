@extends('layouts.app')

@section('page_title', $bodyPart->body_part , ' :: Edit Body Part')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">Edit Body Part: {{ $bodyPart->body_part }}</div>
        <div class="panel-body">

            @include('admin.body-parts.form')

        </div>
    </div>

@endsection
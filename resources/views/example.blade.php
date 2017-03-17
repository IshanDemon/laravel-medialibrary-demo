@extends('layouts.app')

@section('title', $title)

@section('content')
    {!! $content !!}
@endsection

@section('demo')
    @if(!empty($model))
        @include('shared.media_index')
    @endif
@endsection
@extends('layouts.master')

@section('title')
    {{ $page->title }} @parent
@stop

@section('meta')
    <meta name="title" content="{{ $page->meta_title}}" />
    <meta name="description" content="{{ $page->meta_description }}" />
@stop

@section('additions')

@stop

@section('content')
    <div class="page page-default">
        <div class="container">
            <section class="page__content">
                <h1 class="page__title">{{ $page->title }}</h1>
                <div class="page__text">
                    {!! $page->body !!}
                </div>
            </section>
        </div>
    </div>
@stop

@section('scripts')
    <script>

    </script>
@stop
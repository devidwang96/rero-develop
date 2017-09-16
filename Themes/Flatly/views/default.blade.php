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
        <section class="page__content">
            <div class="container">
                <h1 class="page__title">{{ $page->title }}</h1>
            </div>
            <div class="page__text">
                <div class="container">
                    {!! $page->body !!}
                </div>
            </div>
        </section>
    </div>


@stop

@section('scripts')
    <script>

    </script>
@stop
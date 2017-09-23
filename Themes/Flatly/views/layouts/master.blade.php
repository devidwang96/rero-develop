<!DOCTYPE html>
<html>
<head lang="{{ LaravelLocalization::setLocale() }}">
    <meta charset="UTF-8">
    @section('meta')
        <meta name="description" content="@setting('core::site-description')" />
    @show
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @section('title')@setting('core::site-name')@show
    </title>
    <link rel="shortcut icon" href="{{ Theme::url('favicon.ico') }}">
    <link rel="stylesheet" href="/libs/bootstrap.min.css">
    <link rel="stylesheet" href="/libs/bootstrap-theme.min.css">

    <link rel="stylesheet" href="/css/app.css">
    <script src="/libs/jquery-3.2.1.min.js"></script>

    <script src="/libs/bootstrap.min.js"></script>
    @section('additions')
    @show
</head>
<body>
<div class="bg-dots">&nbsp;</div>
<div class="wrapper">

    @include('partials.home-notifications')

    @include('partials.header')

    @yield('content')

    @include('partials.footer')

</div>

{{--{!! Theme::script('js/all.js') !!}--}}
@yield('scripts')

<?php if (Setting::has('core::analytics-script')): ?>
{!! Setting::get('core::analytics-script') !!}
<?php endif; ?>

<script>
    var galleries = $('.bg-gallery img');
    if (galleries.length > 0){
        var images = [];
        var i = 0;
        galleries.each(function(){
            images[i] = $(this).attr('src');
            i++;
        });
        i = 0;

        $('body').css('background-image', 'url('+ images[0] +')');
        setInterval(function(){
            $('body').css('background-image', 'url('+ images[i] +')');
            if(i == (images.length -1)){
                i = 0;
            } else {
                i++;
            }
        },7000);
    } else {
        $('body').css('background-image','url(../images/default-bg.jpg)');
    }


    if($('.modal.notification').length){
        $('.modal.notification').modal('show');
    }
</script>
</body>
</html>
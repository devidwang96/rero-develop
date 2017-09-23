@extends('layouts.master')

@section('title')
    {{ $pagesets->first()->collective_title }} @parent

@stop

@section('meta')
    <meta name="title" content="{{ $pagesets->first()->collective_title}}" />
    <meta name="description" content="{{ $pagesets->first()->collective_meta_description }}" />
    <meta name="keywords" content="{{ $pagesets->first()->collective_meta_keywords }}" />
@stop

@section('additions')
    <script src="/libs/slick.min.js"></script>
    <link rel="stylesheet" href="/libs/slick.css">
    <link rel="stylesheet" href="/libs/slick-theme.css">
@stop

@section('content')
    <div class="page page-collective">

        <div class="bg-gallery" style="display:none">
            <?php  $bg_gallery = $files->findMultipleFilesByZoneForEntity('CollectiveGalleryBg', $pagesets->first()); ?>
            <?php if (!($bg_gallery)->isEmpty()): ?>
            <?php foreach ($bg_gallery as $image): ?>

            <img src="{{ $image->path }}">

            <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <section class="page__content">
            <div class="container">
                <h1 class="page__title">{{ $pagesets->first()->collective_title }}</h1>
            </div>

            <div class="page__content-collective">
                <div class="container">

                    <?php $category_mats = $mats->where('category_id', '>', 0); ?>
                    <?php if($category_mats->isEmpty()): ?>
                        <?php unset($category_mats) ?>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="collective slider" data-descr="#descr_all">

                                    <?php foreach($mats as $mat): ?>
                                        <div class="collective__item">
                                            <div class="collective__item-preview">
                                                <?php $mat_img = $files->findFileByZoneForEntity('Mats', $mat); ?>
                                                <?php if($mat_img != '') : ?>
                                                    <img src="{{ Imagy::getThumbnail($mat_img, 'CollectiveItemThumb') }}">
                                                <?php endif ?>
                                            </div>
                                            <h3 class="collective__item-name">{{$mat->title}}</h3>
                                            <p class="collective__item-teaser">{{$mat->teaser}}</p>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>


                            <div class="col-xs-12">
                                <div class="collective-text slider-descr" id="descr_all">
                                    <?php foreach($mats as $mat): ?>
                                        <div class="collective-text__item">
                                            {!! $mat->full_description !!}
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>





                    <?php else: ?>
                        <div class="row">
                            <div class="col-md-3">
                                <h3>Наш коллектив</h3>
                                <ul class="collective-tabs">
                                    <li class="active"><a data-toggle="tab" href="#collective_all">Все ({{$mats->count()}})</a></li>
                                    <?php foreach($mat_categories as $category): ?>
                                    <li><a data-toggle="tab" href="#collective_{{$category->id}}">{{$category->title}} ({{ $mats->where('category_id', '=', $category->id)->count() }})</a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content">

                                    <div id="collective_all" class="tab-pane fade in active">
                                        <div class="col-xs-12">
                                            <div class="collective slider" data-descr="#descr_all">
                                                <?php foreach($mats as $mat): ?>
                                                <div class="collective__item">
                                                    <div class="collective__item-preview">
                                                        <?php $mat_img = $files->findFileByZoneForEntity('Mats', $mat); ?>
                                                        <?php if($mat_img != '') : ?>
                                                            <img src="{{ Imagy::getThumbnail($mat_img, 'CollectiveItemThumb') }}">
                                                        <?php endif ?>
                                                    </div>
                                                    <h3 class="collective__item-name">{{$mat->title}}</h3>
                                                    <p class="collective__item-teaser">{{$mat->teaser}}</p>
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="collective-text slider-descr" id="descr_all">
                                                <?php foreach($mats as $mat): ?>
                                                <div class="collective-text__item">
                                                    {!! $mat->full_description !!}
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>

                                    </div>


                                    <?php foreach($mat_categories as $category): ?>
                                    <div id="collective_{{$category->id}}" class="tab-pane fade">
                                        <?php if($mats->where('category_id', '=', $category->id)->isEmpty()): ?>
                                            <p class="no_collective">В этой категории нет элементов.</p>
                                        <?php else: ?>
                                            <div class="col-xs-12">
                                                <div class="collective slider" data-descr="#descr_{{$category->id}}">
                                                    <?php foreach($mats->where('category_id', '=', $category->id) as $mat): ?>

                                                    <div class="collective__item">
                                                        <div class="collective__item-preview">
                                                            <?php $mat_img = $files->findFileByZoneForEntity('Mats', $mat); ?>
                                                            <?php if($mat_img != '') : ?>
                                                                <img src="{{ Imagy::getThumbnail($mat_img, 'CollectiveItemThumb') }}">
                                                            <?php endif ?>
                                                        </div>
                                                        <h3 class="collective__item-name">{{$mat->title}}</h3>
                                                        <p class="collective__item-teaser">{{$mat->teaser}}</p>
                                                    </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="collective-text slider-descr" id="descr_{{$category->id}}">
                                                    <?php foreach($mats->where('category_id', '=', $category->id) as $mat): ?>
                                                    <div class="collective-text__item">
                                                        {!! $mat->full_description !!}
                                                    </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>

                                        <?php endif ?>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </section>


        <?php if($pagesets->first()->collective_feedbacks_show == 1): ?>
        <section class="section-feedbacks home-section bg-transparent">
            <h2 class="section-title">Оставьте отзыв!</h2>
            <p class="title-addition">{{ trans('translation::translations.frontend.mainpage.leave_feedback_addition') }}</p>

            <div class="container">
                {!! Form::open(['route' => ['user_create_feedback'], 'method' => 'post']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">
                            <p>{{ trans('translation::translations.frontend.mainpage.feedbacks_form.name') }}</p>
                            <input type="text" name="name" id="name" required>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label for="e-mail">
                            <p>{{ trans('translation::translations.frontend.mainpage.feedbacks_form.email') }}</p>
                            <input type="text" name="email" id="e-mail" required>
                        </label>
                    </div>

                    <div class="col-xs-12">
                        <label for="message">
                            <p>{{ trans('translation::translations.frontend.mainpage.feedbacks_form.message') }}</p>
                            <textarea name="message" id="message" required></textarea>
                        </label>

                    </div>
                    <button type="submit" class="button button-red">{{ trans('translation::translations.frontend.mainpage.feedbacks_form.send') }}</button>
                </div>

                {{--<label for="feedback_photo"> Загрузите файл--}}
                {{--<input type="file" name="feedback_photo" id="feedback_photo" style="display:none">--}}
                {{--</label>--}}
                <input type="hidden" name="curpage" value="{{ Request::route()->getName() }}">
                {!! Form::close() !!}
            </div>

            <div class="container feedbacks">
                <?php if (isset($feedbacks)): ?>
                <?php foreach ($feedbacks as $feedback): ?>

                <div class="feedback">
                    <div class="feedback__name">{{ $feedback->name }}</div>
                    <div class="feedback__text">{!! $feedback->message !!}</div>
                    <div class="feedback__created-at">{{ $feedback->created_at }}</div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <p class="link-center"><a class="button button-red" href="/menu#menu">{{ trans('translation::translations.frontend.mainpage.make_order') }}</a></p>
        </section>
        <?php endif; ?>


    </div>


@stop

@section('scripts')
    <script>
        window.hashName = window.location.hash;
        window.location.hash = '';

        $(document).ready(function(){
            if(window.hashName != ''){
                $('html, body').animate({scrollTop: $(window.hashName).offset().top},1000);
            }

            $('.js-scroll-to').click(function(){
                $('html, body').animate({scrollTop: $($(this).data('scroll')).offset().top},1000);
            });

            $('.collective-tabs li a').on('shown.bs.tab', function(event){
                $('.slider').slick('setPosition');
                $('.slider-descr').slick('setPosition');
            });

            $('.slider.collective').each(function(){
                var descrOwner = $($(this).data('descr'));
                var count = $(this).find('.collective__item').length;
                var infinite = false;
                var centerMode = false;
                if(count >= 3){
                    infinite = true;
                    centerMode = true;
                } else {
                    infinite = false;
                    centerMode = false;
                }
                $(this).slick({
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    variableWidth: true,
                    asNavFor: descrOwner,
                    dots: true,
                    centerMode: centerMode,
                    focusOnSelect: true,
                    infinite: infinite
                });
                $(descrOwner).slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: false,
                    asNavFor: $(this),
                    infinite: infinite
                });
            });
        });
    </script>
@stop
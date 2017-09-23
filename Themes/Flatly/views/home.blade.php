@extends('layouts.master')

@section('title')
    {{ $pagesets->first()->home_title }} @parent

@stop

@section('meta')
    <meta name="title" content="{{ $pagesets->first()->home_title}}" />
    <meta name="description" content="{{ $pagesets->first()->home_meta_description }}" />
    <meta name="keywords" content="{{ $pagesets->first()->home_meta_keywords }}" />
@stop

@section('additions')
    <script src="/libs/slick.min.js"></script>
    <link rel="stylesheet" href="/libs/slick.css">
    <link rel="stylesheet" href="/libs/slick-theme.css">
@stop

@section('content')

    <div class="page page-home">
        <div class="bg-gallery" style="display:none">
            <?php  $bg_gallery = $files->findMultipleFilesByZoneForEntity('HomeGalleryBg', $pagesets->first()); ?>
            <?php if (!($bg_gallery)->isEmpty()): ?>
            <?php foreach ($bg_gallery as $image): ?>

            <img src="{{ Imagy::getThumbnail($image->path, 'PageBg') }}">

            <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <section class="page__intro">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p class="page__intro-slogan">{{trans('translation::translations.frontend.mainpage.slogan_string')}}</p>
            <h1>{{ trans('translation::translations.frontend.mainpage.welcome_string')}}</h1>
            <?php if($pagesets->first()->home_menu_button_show == 1): ?>
                <p class="link-center"><a href="#" class="button button-white">{{ trans('translation::translations.frontend.mainpage.show_menu_string') }}</a></p>
            <?php endif; ?>

        </section>


        <?php if($pagesets->first()->home_dishes_categories_show == 1): ?>
        <section class="page-home__dishes_categories home-section">
            <div class="container">

                <div class="row">
                    <?php if (isset($categories)): ?>
                    <?php foreach ($categories as $category): ?>

                    <div class="col-md-6 col-lg-4">
                        <div class="page-home__dishes_category-dish">
                            <h3 class="dish__title">{{$category->title}}</h3>
                            <?php
                            $category_img = $files->findFileByZoneForEntity('DishesCategory', $category)->path;
                            ?>
                            <img src="{{ Imagy::getThumbnail($category_img, 'DishesCategoryOnMainThumb') }}">
                            <p class="dish__description">{{$category->teaser}}</p>
                            <p class="link-center"><a href="/menu/#dishes_category_{{$category->id}}" class="button button-red">{{ trans('translation::translations.frontend.mainpage.see_button') }}</a></p>
                        </div>
                    </div>
                    <?php endforeach ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>



        <?php if($pagesets->first()->home_dishes_show == 1): ?>
        <section class="page-home__dishes-catalog home-section">
            <div class="container">
                <h2 class="dishes-catalog__title section-title">{{ trans('translation::translations.frontend.mainpage.our_menu_string')}}</h2>
                <p class="title-addition">{{ trans('translation::translations.frontend.mainpage.our_menu_addition')}}</p>

                <div class="dishes-catalog__catalog">
                    <div class="dishes-catalog__catalog-items clearfix">
                        <?php if (isset($dishes)): ?>
                        <?php foreach ($dishes as $dish): ?>
                        <div class="col-md-6">
                            <div class="dishes-catalog__catalog-item">
                                <div class="catalog-item__title">{{$dish->title}}</div>
                                <div class="catalog-item__short-contain">{{$dish->short_contain}}</div>
                                <div class="catalog-item__price">{{$dish->price}} {{ trans('translation::translations.frontend.global.valute')}}.</div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <p><a href="/menu" class="button button-red">{{ trans('translation::translations.frontend.mainpage.show_full_menu_string')}}</a></p>

                </div>

                <div class="dishes-catalog__catalog-dishes">
                    <?php if (isset($dishes)): ?>
                        <?php foreach ($dishes as $dish): ?>
                            <div class="dish">
                                <div class="dish__preview">
                                    <?php
                                        $dish_img = $files->findFileByZoneForEntity('Dishes', $dish)->path;
                                    ?>
                                    <img src="{{ Imagy::getThumbnail($dish_img, 'DishesOnMainThumb') }}">
                                </div>
                                <div class="dish__data">
                                    <p class="dish__data-title">{{$dish->title}}</p>
                                    <p class="dish__data-category">{{ $categories->find($dish->category_id)->title }}</p>
                                </div>
                                <div class="dish__buttons">
                                    <p><button data-toggle="modal" data-target="#dish_modal_{{$dish->id}}" class="button button-blue">Посмотреть</button></p>
                                    <p><button data-toggle="modal" data-target="#dish_pay_modal_{{$dish->id}}" class="button button-red">Заказать</button></p>
                                </div>
                            </div>

                            <div id="dish_modal_{{$dish->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">{{$dish->title}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-preview">
                                                <img src="{{ $dish_img }}">
                                            </div>
                                            <div class="modal-descr">
                                                {!! $dish->full_description !!}
                                            </div>
                                            <div class="modal-paysection">
                                                <h3>Заказать блюдо</h3>
                                                {!! Form::open(['route' => ['user_create_order'], 'method' => 'post']) !!}
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-6">
                                                            <label for="dish_{{$dish->id}}_name">
                                                                <p>Напишите своё имя</p>
                                                                <input required type="text" name="name" id="dish_{{$dish->id}}_name">
                                                            </label>
                                                        </div>
                                                        <div class="col-xs-12 col-md-6">
                                                            <label for="dish_{{$dish->id}}_tel">
                                                                <p>Напишите свой телефон</p>
                                                                <input required type="text" name="tel" id="dish_{{$dish->id}}_tel">
                                                            </label>
                                                        </div>

                                                        <input type="hidden" name="dish_id" value="{{$dish->id}}">
                                                        <input type="hidden" name="curpage" value="{{ Request::route()->getName() }}">
                                                        <div class="col-xs-12 modal_submit">
                                                            <button type="submit" class="button button-red">Заказать</button>
                                                        </div>
                                                    </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="dish_pay_modal_{{$dish->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">заказать блюдо: {{$dish->title}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-paysection">
                                                {!! Form::open(['route' => ['user_create_order'], 'method' => 'post']) !!}
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-6">
                                                        <label for="dish_{{$dish->id}}_name">
                                                            <p>Напишите своё имя</p>
                                                            <input required type="text" name="name" id="dish_{{$dish->id}}_name">
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6">
                                                        <label for="dish_{{$dish->id}}_tel">
                                                            <p>Напишите свой телефон</p>
                                                            <input required type="text" name="tel" id="dish_{{$dish->id}}_tel">
                                                        </label>
                                                    </div>

                                                    <input type="hidden" name="dish_id" value="{{$dish->id}}">
                                                    <input type="hidden" name="curpage" value="{{ Request::route()->getName() }}">
                                                    <div class="col-xs-12 modal_submit">
                                                        <button type="submit" class="button button-red">Заказать</button>
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>


        <?php if($pagesets->first()->home_addition_content_show == 1): ?>
        <section class="home-page__addition-content home-section">
            <div class="container">
                <h2 class="addition-content__title section-title">{{ $pagesets->first()->home_add_content_title }}</h2>
                {!! $pagesets->first()->home_add_content !!}
            </div>
        </section>
        <?php endif; ?>


        <?php if($pagesets->first()->home_gallery_show == 1): ?>
        <section class="page-home__about home-section">
            <div class="container">
                <h2 class="section-title">{{ trans('translation::translations.frontend.mainpage.gallery_title')}}</h2>

                <div class="about__slider">
                    <?php $main_gallery = $files->findMultipleFilesByZoneForEntity('HomeGalleryAbout', $pagesets->first()); ?>

                    <?php if (isset($main_gallery)): ?>
                    <?php foreach ($main_gallery as $image): ?>
                    <button data-toggle="modal" data-target="#main-gallery-{{$image->id}}" class="slide">
                        <img src="{{ Imagy::getThumbnail($image, 'MainGallery') }}">
                    </button>
                    <?php endforeach; ?>

                    <?php endif; ?>
                </div>
            </div>

            <?php if (isset($main_gallery)): ?>
                <?php foreach ($main_gallery as $image): ?>
                <div id="main-gallery-{{$image->id}}" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ $image->path }}">
                            </div>
                        </div>

                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>
        <?php endif; ?>


        <?php if($pagesets->first()->home_feedbacks_show == 1): ?>
            <section class="section-feedbacks home-section bg-darkbrown">
                <h2 class="section-title">{{ trans('translation::translations.frontend.mainpage.leave_feedback_string') }}</h2>
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

                <p class="link-center"><a href="/menu#menu" class="button button-red">{{ trans('translation::translations.frontend.mainpage.make_order') }}</a></p>
            </section>
        <?php endif; ?>
    </div>


@stop

@section('scripts')
    <script>
        $('.page-home__about .about__slider').slick({
            centerMode: true,
            centerPadding: '',
            slidesToShow: 5,
            autoplay: 3000,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        arrows: true,
                        centerMode: true,
                        centerPadding: '30',
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        arrows: true,
                        centerMode: true,
                        centerPadding: '20px',
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 665,
                    settings: {
                        arrows: true,
                        centerMode: true,
                        centerPadding: '0',
                        slidesToShow: 1
                    }
                }
            ]
        });
    </script>
@stop
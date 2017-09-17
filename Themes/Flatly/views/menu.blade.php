@extends('layouts.master')

@section('title')
    {{ $pagesets->first()->menu_title }} @parent

@stop

@section('meta')
    <meta name="title" content="{{ $pagesets->first()->menu_title}}" />
    <meta name="description" content="{{ $pagesets->first()->menu_meta_description }}" />
    <meta name="keywords" content="{{ $pagesets->first()->menu_meta_keywords }}" />
@stop

@section('additions')

@stop

@section('content')

    <div class="page page-menu">
        <section class="page__content">
            <div class="container">
                <h1 class="page__title">{{ $pagesets->first()->menu_title }}</h1>
            </div>

            <div class="page__content-menu" id="menu">
                <div class="container">
                    <h2>
                        {{ trans('translation::translations.frontend.menupage.menulist') }}
                    </h2>

                    <?php if(!$categories->isEmpty()): ?>
                        <?php foreach($categories as $category): ?>
                            <div class="menu__category" id="dishes_category_{{$category->id}}">
                                <h3>{{ $category->title }}</h3>
                                <div class="menu__category-dishes">
                                    <?php $category_dishes = $dishes->where('category_id', '=', $category->id); ?>

                                    <?php if(!$category_dishes->isEmpty()): ?>
                                        <ul>
                                            <?php foreach($category_dishes as $dish): ?>
                                                <li>
                                                    <p class="dish__title" data-toggle="modal" data-target="#dish_modal_{{$dish->id}}">{{ $dish->title }}</p>
                                                    <div class="dish__right-content">
                                                        <span class="dish__price">{{ $dish->price }} {{ trans('translation::translations.frontend.global.valute')}}.</span>
                                                        <button data-toggle="modal" data-target="#dish_pay_modal_{{$dish->id}}" class="button button-red">Заказать</button>
                                                    </div>


                                                    <?php
                                                        $dish_img = $files->findFileByZoneForEntity('Dishes', $dish)->path;
                                                    ?>
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
                                                                        {!! Form::open(['route' => ['admin.orders.order.user_store_menu'], 'method' => 'post']) !!}
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
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>


                </div>
            </div>

        </section>


        <section class="section-feedbacks">
            <h2 class="section-title"> {{ trans('translation::translations.frontend.menupage.leave_fedback') }}</h2>
            <p class="title-addition">{{ trans('translation::translations.frontend.mainpage.leave_feedback_addition') }}</p>

            <div class="container">
                {!! Form::open(['route' => ['admin.feedbacks.feedback.user_store_menu'], 'method' => 'post']) !!}
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

            <p class="link-center"><button data-scroll="#menu" href="#" class="button button-red js-scroll-to">{{ trans('translation::translations.frontend.mainpage.make_order') }}</button></p>
        </section>

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
        });
    </script>
@stop
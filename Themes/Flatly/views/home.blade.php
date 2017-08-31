@extends('layouts.master')

@section('title')
    {{ $page->title }} @parent
@stop

@section('meta')
    <meta name="title" content="{{ $page->meta_title}}" />
    <meta name="description" content="{{ $page->meta_description }}" />
@stop

@section('additions')
    <script src="/libs/slick.min.js"></script>
    <link rel="stylesheet" href="/libs/slick.css">
    <link rel="stylesheet" href="/libs/slick-theme.css">
@stop

@section('content')

    <div class="page page-home">
        <section class="page__intro">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p class="page__intro-slogan">Какой нибудь слоган</p>
            <h1>Добро пожаловать в кафе "Реро"</h1>
            <a href="#" class="button button-white">Посмотреть наше меню</a>
        </section>

        <section class="page-home__dishes_categories home-section">
            <div class="container">



                <div class="row">
                        <?php foreach ($categories as $category): ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="page-home__dishes_category-dish">
                                    <h3 class="dish__title">{{$category->title}}</h3>
                                    <?php
                                        $category_img = $files->findFileByZoneForEntity('DishesCategory', $category)->path;
                                    ?>
                                    <img src="{{ Imagy::getThumbnail($category_img, 'DishesCategoryOnMainThumb') }}">
                                    <p class="dish__description">{{$category->teaser}}</p>
                                    <p class="dish__link"><a href="/menu/{{$category->id}}" class="button button-red">Посмотреть</a></p>
                                </div>
                            </div>
                        <?php endforeach ?>

                </div>
            </div>

        </section>

        <section class="page-home__dishes-catalog home-section">
            <div class="container">
                <h2 class="dishes-catalog__title section-title">Наше меню</h2>
                <p class="title-addition">Обслуживание только самых лучших кулинарных изысков. Приходите к нам и наслаждайтесь.</p>

                <div class="dishes-catalog__catalog">
                    <div class="dishes-catalog__catalog-items clearfix">


                        <?php foreach ($dishes as $dish): ?>
                            <div class="col-md-6">
                                <div class="dishes-catalog__catalog-item">
                                    <div class="catalog-item__title">{{$dish->title}}</div>
                                    <div class="catalog-item__short-contain">{{$dish->short_contain}}</div>
                                    <div class="catalog-item__price">{{$dish->price}} руб.</div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                    <p><a href="#" class="button button-red">Посмотреть полный список</a></p>

                </div>

                <div class="dishes-catalog__catalog-dishes">

                    <?php foreach ($dishes as $dish): ?>
                        <a href="/dishes/{{$dish->id}}" class="dish">
                            <div class="dish__preview">
                                <?php
                                    $dish_img = $files->findFileByZoneForEntity('DishesGallery', $dish)->path;
                                ?>
                                <img src="{{ Imagy::getThumbnail($dish_img, 'DishesOnMainThumb') }}">
                            </div>
                            <div class="dish__data">
                                <p class="dish__data-title">{{$dish->title}}</p>
                                <p class="dish__data-category">{{ $categories->find($dish->category_id)->title }}</p>
                            </div>
                        </a>
                    <?php endforeach; ?>


                </div>
            </div>
        </section>

        <section class="page-home__about home-section">
            <div class="container">
                <h2 class="section-title">Наша жизнь</h2>

                <div class="about__slider">
                    <div class="slide">
                        <img src="https://img01.rl0.ru/afisha/-x746/rests.afisha.ru/uploads/images/6/c5/6c5c9e32623a47a5bf0737da18eb2623.jpg" alt="">
                    </div>

                    <div class="slide">
                        <img src="http://coffeet.ru/wp-content/uploads/2015/02/%D0%A1%D0%B5%D0%BA%D1%80%D0%B5%D1%82%D1%8B-%D1%83%D1%81%D0%BF%D0%B5%D1%85%D0%B0-%D0%BA%D0%BE%D1%84%D0%B5%D0%B9%D0%BD%D0%B8-%D0%B8%D0%BB%D0%B8-%D0%BA%D0%B0%D1%84%D0%B5.jpg" alt="">
                    </div>

                    <div class="slide">
                        <img src="http://static.vl.ru/catalog/1461673664048_big_vlru.jpg" alt="">
                    </div>

                    <div class="slide">
                        <img src="http://eda.vlasnasprava.ua/wp-content/uploads/2017/05/34fc9677-5910-4e7a-a7da-ffae13f62f53_square.jpg" alt="">
                    </div>

                    <div class="slide">
                        <img src="http://static.vl.ru/catalog/1461673663734_big_vlru.jpg" alt="">
                    </div>

                    <div class="slide">
                        <img src="https://media-cdn.tripadvisor.com/media/photo-s/04/b5/fd/3c/glowsubs-sandwiches.jpg" alt="">
                    </div>
                </div>
            </div>


        </section>

        <section class="page-home__feedbacks home-section">
            <h2 class="section-title">Оставить отзыв</h2>
            <p class="title-addition">Нам интересно ваше мнение, пожалуйста, оставьте отзыв:)</p>

            <div class="container">
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">
                                <p>Имя</p>
                                <input type="text" name="name" id="name" required>
                            </label>
                        </div>
                        <div class="col-md-6">
                            <label for="e-mail">
                                <p>E-mail</p>
                                <input type="text" name="e-mail" id="e-mail" required>
                            </label>
                        </div>



                        <div class="col-xs-12">
                            <label for="message">
                                <p>Ваше сообщение</p>
                                <textarea name="message" id="message" required></textarea>
                            </label>

                        </div>
                        <p><a href="#" class="button button-red">Отправить</a></p>
                    </div>
                </form>
            </div>

        </section>

    </div>


@stop

@section('scripts')
    <script>
        $('.page-home__about .about__slider').slick({
            centerMode: true,
            centerPadding: '',
            slidesToShow: 5,
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

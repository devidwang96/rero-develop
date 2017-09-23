@extends('layouts.master')

@section('title')
    {{ $pagesets->first()->gallery_title }} @parent

@stop

@section('meta')
    <meta name="title" content="{{ $pagesets->first()->gallery_title}}" />
    <meta name="description" content="{{ $pagesets->first()->gallery_meta_description }}" />
    <meta name="keywords" content="{{ $pagesets->first()->gallery_meta_keywords }}" />
@stop

@section('additions')

@stop

@section('content')
    <div class="page page-gallery">

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
                <h1 class="page__title">{{ $pagesets->first()->gallery_title }}</h1>
            </div>

            <div class="page__content-gallery">
                <div class="container">

                    <?php $category_mats = $mats->where('category_id', '>', 0); ?>
                    <?php if($category_mats->isEmpty()): ?>
                    <?php unset($category_mats) ?>



                    <div class="gallery">
                        <?php foreach($mats as $mat): ?>
                            <div class="gallery__item" data-toggle="modal" data-target="#gallery_item_{{$mat->id}}">
                                <div class="gallery__item-preview">
                                    <?php $mat_img = $files->findFileByZoneForEntity('Mats', $mat); ?>
                                    <?php if($mat_img == '') : ?>

                                        <img src="/images/gallery-no-image.jpg">
                                        <span class="no-image-text">Нет изображения</span>
                                    <?php else: ?>
                                    <img src="{{ Imagy::getThumbnail($mat_img, 'GalleryItemThumb') }}">
                                    <?php endif ?>
                                </div>
                                <div class="gallery__item-description">
                                    <h3 class="gallery__item-name">{{$mat->title}}</h3>
                                    <p class="gallery__item-teaser">{{$mat->teaser}}</p>
                                </div>
                            </div>

                            <div id="gallery_item_{{$mat->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">{{$mat->title}}</h4>
                                            <p class="modal-title-addition">{{$mat->teaser}}</p>
                                        </div>
                                        <div class="modal-body">
                                            <?php if($mat_img != '') : ?>
                                            <img src="{{ Imagy::getThumbnail($mat_img, 'CollectiveItemThumb') }}">
                                            <?php endif ?>
                                            <p>{!! $mat->full_description !!}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>



                    <?php else: ?>
                    <div class="row">
                        <div class="col-md-3">
                            <h3>Галерея</h3>
                            <ul class="gallery-tabs">
                                <li class="active"><a data-toggle="tab" href="#gallery_all">Все ({{$mats->count()}})</a></li>
                                <?php foreach($mat_categories as $category): ?>
                                <li><a data-toggle="tab" href="#gallery_{{$category->id}}">{{$category->title}} ({{ $mats->where('category_id', '=', $category->id)->count() }})</a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content">

                                <div id="gallery_all" class="tab-pane fade in active">


                                    <div class="gallery">
                                        <?php foreach($mats as $mat): ?>
                                        <div class="gallery__item" data-toggle="modal" data-target="#gallery_item_{{$mat->id}}">
                                            <div class="gallery__item-preview">
                                                <?php $mat_img = $files->findFileByZoneForEntity('Mats', $mat); ?>
                                                <?php if($mat_img == '') : ?>
                                                <img src="{{ Imagy::getThumbnail($mat_img, 'CollectiveItemThumb') }}">
                                                <?php endif ?>
                                            </div>
                                            <div class="gallery__item-description">
                                                <h3 class="gallery__item-name">{{$mat->title}}</h3>
                                                <p class="gallery__item-teaser">{{$mat->teaser}}</p>
                                            </div>
                                        </div>

                                        <div id="gallery_item_{{$mat->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">{{$mat->title}}</h4>
                                                        <p class="modal-title-addition">{{$mat->teaser}}</p>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php if($mat_img == '') : ?>

                                                        <img src="{{ Imagy::getThumbnail($mat_img, 'CollectiveItemThumb') }}">
                                                        <?php endif ?>
                                                        <p>{!! $mat->full_description !!}</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>



                                </div>




                                <?php foreach($mat_categories as $category): ?>

                                    <div id="gallery_{{$category->id}}" class="tab-pane fade">



                                        <div class="gallery">
                                            <?php foreach($mats->where('category_id', '=', $category->id) as $mat): ?>
                                            <div class="gallery__item" data-toggle="modal" data-target="#gallery_item_all{{$mat->id}}">
                                                <div class="gallery__item-preview">
                                                    <?php $mat_img = $files->findFileByZoneForEntity('Mats', $mat); ?>
                                                    <?php if($mat_img == '') : ?>

                                                    <img src="/images/gallery-no-image.jpg">
                                                    <span class="no-image-text">Нет изображения</span>
                                                    <?php else: ?>
                                                    <img src="{{ Imagy::getThumbnail($mat_img, 'GalleryItemThumb') }}">
                                                    <?php endif ?>
                                                </div>
                                                <div class="gallery__item-description">
                                                    <h3 class="gallery__item-name">{{$mat->title}}</h3>
                                                    <p class="gallery__item-teaser">{{$mat->teaser}}</p>
                                                </div>
                                            </div>

                                            <div id="gallery_item_all{{$mat->id}}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">{{$mat->title}}</h4>
                                                            <p class="modal-title-addition">{{$mat->teaser}}</p>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php if($mat_img == '') : ?>

                                                            <img src="/images/gallery-no-image.jpg">
                                                            <span class="no-image-text">Нет изображения</span>
                                                            <?php else: ?>
                                                            <img src="{{$mat_img->path}}">
                                                            <?php endif ?>
                                                            <p>{!! $mat->full_description !!}</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>




                                    </div>

                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </section>


        <?php if($pagesets->first()->gallery_feedbacks_show == 1): ?>
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
        });
    </script>
@stop
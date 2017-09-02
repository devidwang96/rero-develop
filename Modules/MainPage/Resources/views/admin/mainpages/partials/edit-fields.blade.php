<div class="box-body">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class='form-group{{ $errors->has("$lang.slogan_string") ? ' has-error' : '' }}'>
                <?php $old_slogan_string = isset($mainpage->translate($lang)->slogan_string) ? $mainpage->translate($lang)->slogan_string : ''; ?>
                {!! Form::label("{$lang}[slogan_string]", trans('mainpage::mainpage.form.slogan_string')) !!}
                {!! Form::text("{$lang}[slogan_string]", old("$lang.[slogan_string]", $old_slogan_string), ['class' => 'form-control', 'placeholder' => trans('mainpage::mainpage.form.slogan_string')]) !!}
                {!! $errors->first("$lang.slogan_string", '<span class="help-block">:message</span>') !!}
            </div>
        </div>


        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class='form-group{{ $errors->has("$lang.welcome_string") ? ' has-error' : '' }}'>
                <?php $old_welcome_string = isset($mainpage->translate($lang)->welcome_string) ? $mainpage->translate($lang)->welcome_string : ''; ?>
                {!! Form::label("{$lang}[welcome_string]", trans('mainpage::mainpage.form.welcome_string')) !!}
                {!! Form::text("{$lang}[welcome_string]", old("$lang.[welcome_string]", $old_welcome_string), ['class' => 'form-control', 'placeholder' => trans('mainpage::mainpage.form.welcome_string')]) !!}
                {!! $errors->first("$lang.welcome_string", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class='form-group{{ $errors->has("$lang.show_menu_string") ? ' has-error' : '' }}'>
                <?php $old_show_menu_string = isset($mainpage->translate($lang)->show_menu_string) ? $mainpage->translate($lang)->show_menu_string : ''; ?>
                {!! Form::label("{$lang}[show_menu_string]", trans('mainpage::mainpage.form.show_menu_string')) !!}
                {!! Form::text("{$lang}[show_menu_string]", old("$lang.[show_menu_string]", $old_show_menu_string), ['class' => 'form-control', 'placeholder' => trans('mainpage::mainpage.form.show_menu_string')]) !!}
                {!! $errors->first("$lang.show_menu_string", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class='form-group{{ $errors->has("$lang.our_menu_string") ? ' has-error' : '' }}'>
                <?php $old_our_menu_string = isset($mainpage->translate($lang)->our_menu_string) ? $mainpage->translate($lang)->our_menu_string : ''; ?>
                {!! Form::label("{$lang}[our_menu_string]", trans('mainpage::mainpage.form.our_menu_string')) !!}
                {!! Form::text("{$lang}[our_menu_string]", old("$lang.[our_menu_string]", $old_our_menu_string), ['class' => 'form-control', 'placeholder' => trans('mainpage::mainpage.form.our_menu_string')]) !!}
                {!! $errors->first("$lang.our_menu_string", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class='form-group{{ $errors->has("$lang.our_menu_addition_string") ? ' has-error' : '' }}'>
                <?php $old_our_menu_addition_string = isset($mainpage->translate($lang)->our_menu_addition_string) ? $mainpage->translate($lang)->our_menu_addition_string : ''; ?>
                {!! Form::label("{$lang}[our_menu_addition_string]", trans('mainpage::mainpage.form.our_menu_addition_string')) !!}
                {!! Form::text("{$lang}[our_menu_addition_string]", old("$lang.[our_menu_addition_string]", $old_our_menu_addition_string), ['class' => 'form-control', 'placeholder' => trans('mainpage::mainpage.form.our_menu_addition_string')]) !!}
                {!! $errors->first("$lang.our_menu_addition_string", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class='form-group{{ $errors->has("$lang.show_full_menu_string") ? ' has-error' : '' }}'>
                <?php $old_show_full_menu_string = isset($mainpage->translate($lang)->show_full_menu_string) ? $mainpage->translate($lang)->show_full_menu_string : ''; ?>
                {!! Form::label("{$lang}[show_full_menu_string]", trans('mainpage::mainpage.form.show_full_menu_string')) !!}
                {!! Form::text("{$lang}[show_full_menu_string]", old("$lang.[show_full_menu_string]", $old_show_full_menu_string), ['class' => 'form-control', 'placeholder' => trans('mainpage::mainpage.form.show_full_menu_string')]) !!}
                {!! $errors->first("$lang.show_full_menu_string", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class='form-group{{ $errors->has("$lang.gallery_title") ? ' has-error' : '' }}'>
                <?php $old_gallery_title = isset($mainpage->translate($lang)->gallery_title) ? $mainpage->translate($lang)->gallery_title : ''; ?>
                {!! Form::label("{$lang}[gallery_title]", trans('mainpage::mainpage.form.gallery_title')) !!}
                {!! Form::text("{$lang}[gallery_title]", old("$lang.[gallery_title]", $old_gallery_title), ['class' => 'form-control', 'placeholder' => trans('mainpage::mainpage.form.gallery_title')]) !!}
                {!! $errors->first("$lang.gallery_title", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class='form-group{{ $errors->has("$lang.leave_feedback_title") ? ' has-error' : '' }}'>
                <?php $old_leave_feedback_title = isset($mainpage->translate($lang)->leave_feedback_title) ? $mainpage->translate($lang)->leave_feedback_title : ''; ?>
                {!! Form::label("{$lang}[leave_feedback_title]", trans('mainpage::mainpage.form.leave_feedback_title')) !!}
                {!! Form::text("{$lang}[leave_feedback_title]", old("$lang.[leave_feedback_title]", $old_leave_feedback_title), ['class' => 'form-control', 'placeholder' => trans('mainpage::mainpage.form.leave_feedback_title')]) !!}
                {!! $errors->first("$lang.leave_feedback_title", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class='form-group{{ $errors->has("$lang.leave_feedback_addition") ? ' has-error' : '' }}'>
                <?php $old_leave_feedback_addition = isset($mainpage->translate($lang)->leave_feedback_addition) ? $mainpage->translate($lang)->leave_feedback_addition : ''; ?>
                {!! Form::label("{$lang}[leave_feedback_addition]", trans('mainpage::mainpage.form.leave_feedback_addition')) !!}
                {!! Form::text("{$lang}[leave_feedback_addition]", old("$lang.[leave_feedback_addition]", $old_leave_feedback_addition), ['class' => 'form-control', 'placeholder' => trans('mainpage::mainpage.form.leave_feedback_addition')]) !!}
                {!! $errors->first("$lang.leave_feedback_addition", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class='form-group{{ $errors->has("$lang.copyrights") ? ' has-error' : '' }}'>
                <?php $old_copyrights = isset($mainpage->translate($lang)->copyrights) ? $mainpage->translate($lang)->copyrights : ''; ?>
                {!! Form::label("{$lang}[copyrights]", trans('mainpage::mainpage.form.copyrights')) !!}
                {!! Form::text("{$lang}[copyrights]", old("$lang.[copyrights]", $old_copyrights), ['class' => 'form-control', 'placeholder' => trans('mainpage::mainpage.form.copyrights')]) !!}
                {!! $errors->first("$lang.copyrights", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="col-xs-12">
            <div class='form-group{{ $errors->has("$lang.addition_content_title") ? ' has-error' : '' }}'>
                <?php $old_addition_content_title = isset($mainpage->translate($lang)->addition_content_title) ? $mainpage->translate($lang)->addition_content_title : ''; ?>
                {!! Form::label("{$lang}[addition_content_title]", trans('mainpage::mainpage.form.addition_content_title')) !!}
                {!! Form::text("{$lang}[addition_content_title]", old("$lang.[addition_content_title]", $old_addition_content_title), ['class' => 'form-control', 'placeholder' => trans('mainpage::mainpage.form.addition_content_title')]) !!}
                {!! $errors->first("$lang.addition_content_title", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="col-xs-12">
            <?php $old_addition_content = isset($mainpage->translate($lang)->addition_content) ? $mainpage->translate($lang)->addition_content : ''; ?>
            @editor('addition_content', trans('dishes::dishes.form.addition_content'), old("{$lang}.addition_content", $old_addition_content), $lang)
        </div>



    </div>


</div>
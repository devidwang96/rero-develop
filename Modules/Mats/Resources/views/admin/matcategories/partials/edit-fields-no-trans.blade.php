<div class="checkbox">
    <?php $old_status = $matcategory->status ?>
    <label for="status">
        <input id="status"
               name="status"
               type="checkbox"
               class="flat-blue"
               {{ ((bool) $old_status) ? 'checked' : '' }}
               value="1" />
        {{ trans('mats::matcategories.form.status') }}
    </label><br>
</div>



<style>
    .checkbox{
        border-bottom:1px solid rgba(0,0,0,0.3);
        padding:15px;
        margin-bottom:15px;
    }
    .checkbox .help{
        font-size:14px;
        color:rgba(0,0,0,0.5);
        font-style: italic;
    }
</style>
<div class="checkbox">
    <?php $oldStatus = $mat->status ?>
    <label for="status">
        <input id="status"
               name="status"
               type="checkbox"
               class="flat-blue"
               {{ ((bool) $oldStatus) ? 'checked' : '' }}
               value="1" />
        {{ trans('mats::mats.form.status') }}
    </label><br>
</div>

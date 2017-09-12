<div class="checkbox">
    <label for="status">
        <input id="status"
               name="status"
               type="checkbox"
               class="flat-blue"
               {{ (is_null(old("status"))) ?: 'checked' }}
               value="1" />
    </label><br>
</div>

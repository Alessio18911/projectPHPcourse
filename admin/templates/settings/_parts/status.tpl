<div class="admin-form__item">
  <div class="checkbox__item">
    <input class="checkbox__btn" type="checkbox" name="status_checkbox" id="status-checkbox" <?=!empty($status_checkbox) ? 'checked' : '' ?>>
    <label class="checkbox__label" for="status-checkbox">Скрыть статус</label>
  </div>
  <h3 class="heading">Статус</h3>
  <label class="input__label">Статус
    <input class="input input--width-label" type="text" name="status" placeholder="Статус" value="<?=$status?>"/>
  </label>
  <label class="input__label">Статус подробнее
    <input class="input input--width-label" type="text" name="status_detailed" placeholder="Статус подробнее" value="<?=$status_detailed?>"/>
  </label>
</div>

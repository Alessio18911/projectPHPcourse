<div class="admin-page__content-form admin-page__single-message">
  <form class="admin-form" method="POST" action="#">
    <div class="admin-form__item">
      <h2 class="heading mb-20">Сообщение №<?=$message_id?></h2>
    </div>

    <div class="admin-form__item">
      <label class="input__label">Время отправки</label>
      <p><?=$sent_time?></p>
    </div>

    <div class="admin-form__item">
      <label class="input__label">Имя отправителя</label>
      <p><?=$sender_name?></p>
    </div>

    <div class="admin-form__item">
      <label class="input__label">Email отправителя</label>
      <p><?=$sender_email?></p>
    </div>

    <div class="admin-form__item">
      <label class="input__label">Текст сообщения</label>
      <p><?=$message_text?></p>
    </div>

    <?php if($attached_file): ?>
      <div class="admin-form__item">
        <label class="input__label">Прикреплённый файл</label>
        <p><?=$attached_file?></p>
      </div>
    <?php endif; ?>

    <div class="admin-form__item buttons">
      <a class="secondary-button" href="<?=HOST?>admin/messages">Вернуться назад</a>
      <button class="primary-button primary-button--red" type="submit" name="delete-message">Удалить</button>
    </div>
  </form>
</div>

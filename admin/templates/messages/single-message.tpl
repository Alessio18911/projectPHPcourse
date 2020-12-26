<div class="admin-page__content-form admin-page__single-message">
  <div class="admin-form">
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
        <p><a href="<?=HOST?>usercontent/contact-form/<?=$file_src?>" target="_blank"><?=$attached_file?></a></p>
      </div>
    <?php endif; ?>

    <div class="admin-form__item buttons">
      <a class="secondary-button" href="<?=HOST?>admin/messages">Вернуться назад</a>
      <a class="primary-button primary-button--red" href="<?=HOST?>admin/messages?message-delete&id=<?=$message_id?>">Удалить</a>
    </div>
  </div>
</div>

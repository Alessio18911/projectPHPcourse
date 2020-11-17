<form class="feedback-form" method="POST" action="<?HOST?>contacts">
  <div class="feedback-form__heading">
    <h2 class="heading">Напишите мне </h2>
  </div>

  <?php include ROOT . "templates/components/errors.tpl" ?>
  <?php include ROOT . "templates/components/success.tpl" ?>

  <div class="feedback-form__input">
    <input class="input" type="text" name="name" value="<?=$message_name?>" placeholder="Ваше имя" />
  </div>
  <div class="feedback-form__input">
    <input class="input" type="text" name="email" value="<?=$message_email?>" placeholder="Email" />
  </div>
  <div class="feedback-form__input">
    <textarea class="textarea" name="message" placeholder="Введите сообщение"><?=$message_text?></textarea>
  </div>
  <div class="feedback-form__upload">
    <div class="block-upload">
      <div class="block-upload__description">
        <div class="block-upload__title">Прикрепить файл:</div>
        <p>jpg, png, pdf, вес до 2 Мб</p>
        <div class="block-upload__file-wrapper">
          <input class="file-button" type="file" name="message_file">
        </div>
      </div>
    </div>
  </div>
  <button class="primary-button" type="submit" name="send_message">Отправить</button>
</form>

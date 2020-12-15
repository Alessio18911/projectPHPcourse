<div class="admin-panel">
  <?php if(isset($_SESSION['login']) && $_SESSION['login'] === 1): ?>
    <div class="admin-panel__block-list">
      <?php if($_SESSION['logged_user']['role'] === 'admin'): ?>
        <a class="admin-panel__link" href="<?=HOST?>admin">
          <img src="<?=HOST?>static/img/admin-panel/target.svg" alt="Перейти в админ панель">
          <div class="span">Панель управления</div>
        </a>
      <?php endif ?>
      <a class="admin-panel__link" href="<?=HOST?>profile">
        <img src="<?=HOST?>static/img/admin-panel/user.svg" alt=" Профиль">
        <div class="span">Профиль</div>
      </a>
      <?php if($_SESSION['logged_user']['role'] === 'admin'): ?>
        <a class="admin-panel__link" href="http://projectphpcourse/admin/messages">
          <div class="control-panel__list-img-wrapper">
            <img class="control-panel__list-img" src="<?=HOST?>static/img/control-panel/mail.svg" alt="icon">
            <?php if ($new_messages_count): ?>
              <div class="control-panel__list-img-badge"><?=$new_messages_count?></div>
            <?php endif; ?>
          </div>
          <div class="span">Сообщения</div>
        </a>
        <a class="admin-panel__link" href="#">
          <div class="admin-panel__comments" data-number="15">
            <img src="<?=HOST?>static/img/admin-panel/message-square.svg" alt="Комментарии">
          </div>
          <div class="span">Комментарии</div>
        </a>
        <a class="admin-panel__link" href="#">
          <img src="<?=HOST?>static/img/admin-panel/edit-3.svg" alt="Редактировать эту страницу">
          <div class="span">Редактировать</div>
        </a>
      <?php endif ?>
      <a href="<?=HOST?>logout" class="admin-panel__block-button">Выход</a>
    </div>
  <?php else: ?>
    <div class="admin-panel__block-list">
      <a href="<?=HOST?>login" class="admin-panel__block-button">Вход</a>
    </div>
  <?php endif ?>
</div>

<li class="control-panel__list-item">
  <a class="control-panel__list-link" href="<?=HOST?>admin/messages">
    <div class="control-panel__list-img-wrapper">
      <img class="control-panel__list-img" src="<?=HOST?>static/img/control-panel/mail.svg" alt="icon" />
      <?php if ($new_messages_count): ?>
        <div class="control-panel__list-img-badge"><?=$new_messages_count?></div>
      <?php endif;?>
    </div>
    Сообщения
  </a>
</li>

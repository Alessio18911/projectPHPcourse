<?php if(!empty($_SESSION['errors'])):
  foreach($_SESSION['errors'] as $error): ?>
    <div class="notifications mb-20">
      <div class="notifications__title notifications__title--error"><?=$errorMsgs[$error]['title']?></div>
      <?php if(isset($errorMsgs[$error]['desc'])): ?>
        <div class="notifications__message"><p><?=$errorMsgs[$error]['desc']?></p></div>
      <?php endif ?>
    </div>
  <?php endforeach ?>
<?php endif ?>

<?php if(!empty($_SESSION['success'])): ?>
  <?php foreach($_SESSION['success'] as $item):
    foreach($item as $success): ?>
      <div class="notifications mb-20">
        <div class="notifications__title notifications__title--success"><?=$successMsgs[$item]['success']['title']?></div>
        <?php if(isset($successMsgs[$item]['success']['desc'])): ?>
          <div class="notifications__message">
            <p><?=$successMsgs[$item]['success']['desc']?></p>
          </div>
        <?php endif ?>
      </div>
    <?php endforeach ?>
  <?php endforeach ?>
<?php endif ?>

<?php if(!empty($_SESSION['success'])): ?>
  <?php foreach($_SESSION['success'] as $item): ?>
    <div class="notifications mb-20">
      <div class="notifications__title notifications__title--success"><?=$successMsgs[$item]['title']?></div>
      <?php if(isset($successMsgs[$item]['desc'])): ?>
        <div class="notifications__message">
          <p><?=$successMsgs[$item]['desc']?></p>
        </div>
      <?php endif ?>
    </div>
  <?php endforeach ?>
<?php endif ?>

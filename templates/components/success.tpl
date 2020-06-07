<?php if(!empty($_SESSION['success'])): ?>
  <?php foreach($_SESSION['success'] as $key => $item):
    foreach($item as $success): ?>
      <div class="notifications mb-20">
        <div class="notifications__title notifications__title--success">
          <?=$successMsgs[$key][$success]['title']?>
        </div>
        <?php if(isset($successMsgs[$key]['success']['desc'])): ?>
          <div class="notifications__message">
            <p><?=$successMsgs[$key]['success']['desc']?></p>
          </div>
        <?php endif ?>
      </div>
    <?php endforeach ?>
  <?php endforeach ?>
<?php endif ?>

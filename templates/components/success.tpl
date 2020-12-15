<?php if(!empty($_SESSION['success'])):
  foreach($_SESSION['success'] as $key => $item):
    foreach($item as $success): ?>
      <div class="notifications notifications--success mb-20">
        <div class="notifications__title notifications__title--success">
          <?=$success_msgs[$key][$success]['title']?>
        </div>
        <?php if(isset($success_msgs[$key]['success']['desc'])): ?>
          <div class="notifications__message">
            <p><?=$success_msgs[$key]['success']['desc']?></p>
          </div>
        <?php endif ?>
      </div>
    <?php endforeach;
  endforeach;
  $_SESSION['success'] = []; ?>
<?php endif ?>

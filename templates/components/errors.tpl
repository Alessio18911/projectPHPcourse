<?php if(!empty($_SESSION['errors'])):
  foreach($_SESSION['errors'] as $key => $item):
    foreach($item as $error): ?>
      <div class="notifications mb-20">
        <div class="notifications__title notifications__title--error">
          <?=$error_msgs[$key][$error]['title']?>
        </div>
        <?php if(isset($error_msgs[$key][$error]['desc'])): ?>
          <div class="notifications__message">
            <p>
              <?=$error_msgs[$key][$error]['desc']?>
            </p>
          </div>
        <?php endif ?>
      </div>
    <?php endforeach;
  endforeach;
endif ?>

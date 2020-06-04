<?php if(!empty($_SESSION['errors'])):
  foreach($_SESSION['errors'] as $key => $item):
    foreach($item as $error): ?>
      <div class="notifications mb-20">
        <div class="notifications__title notifications__title--error">
          <?=$errorMsgs[$key][$error]['title']?>
        </div>
        <?php if(isset($errorMsgs[$key][$error]['desc'])): ?>
          <div class="notifications__message">
            <p>
              <?=$errorMsgs[$key][$error]['desc']?>
            </p>
          </div>
        <?php endif ?>
      </div>
    <?php endforeach ?>
  <?php endforeach ?>
<?php endif ?>

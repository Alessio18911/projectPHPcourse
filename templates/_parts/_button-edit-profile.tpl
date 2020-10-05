<?php if($is_logged && ($is_this_user || $is_admin)): ?>
  <a class="secondary-button mt-15" href="<?=HOST?>profile-edit/<?=$user_id?>">Редактировать</a>
<?php endif ?>

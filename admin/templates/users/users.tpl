<div class="admin-page__content-form">
  <div class="admin-form" style="width: 900px;">
    <div class="admin-form__item d-flex justify-content-between mb-20">
      <h2 class="heading">Пользователи</h2>
    </div>
    <?php include ROOT . "admin/templates/components/errors.tpl" ?>
    <?php include ROOT . "admin/templates/components/success.tpl" ?>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Фото</th>
          <th>Имя и фамилия</th>
          <th>Страна</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($users)):
          foreach($users as $user): ?>
            <tr class="user">
              <td><?=$user->id?></td>
              <td>
                <a href="<?=HOST?>profile/<?=$user->id?>">
                  <div class="avatar-small">
                    <img src="http://projectphpcourse/usercontent/avatars/<?=isset($user->avatar_small) ? $user->avatar_small : 'blank-avatar.svg' ?>" alt="Аватарка">
                  </div>
                </a>
              </td>
              <td>
                <a href="<?=HOST?>profile/<?=$user['id']?>">
                  <?=$user->name?> <?=$user->surname?>
                </a>
              </td>
              <td><?=$user->country?></td>
              <td><a class="icon-delete" href="<?=HOST?>admin/user-delete?id=<?=$user->id?>"></a></td>
            </tr>
          <?php endforeach;
        endif; ?>
      </tbody>
    </table>
  </div>
</div>

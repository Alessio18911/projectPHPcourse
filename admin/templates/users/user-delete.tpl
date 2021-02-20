<div class="admin-page__content-form">
  <form class="admin-form" method="POST" action="<?=HOST?>admin/user-delete?id=<?=htmlentities($user_id)?>">
    <div class="admin-form__item">
      <h2 class="heading mb-20">Удалить пользователя</h2>
    </div>

    <p class="mb-30">Вы действительно хотите удалить пользователя <span style="font-size: 21px"><b><i><?=htmlentities($user_to_delete_name)?> <?=htmlentities($user_to_delete_surname)?></i></b></span>  ? Вся информация о нём будет полностью удалена с сервера!</p>

    <div class="admin-form__item buttons">
      <button class="primary-button primary-button--red" type="submit" name="delete-user">Да, удалить</button>
      <a class="secondary-button" href="<?=HOST?>admin/users">Отмена</a>
    </div>
    <div class="admin-form__item"></div>
    <div class="admin-form__item"></div>
  </form>
</div>

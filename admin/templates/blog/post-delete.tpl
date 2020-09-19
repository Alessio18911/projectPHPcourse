<div class="admin-page__content-form">
  <form class="admin-form" method="POST" action="<?=HOST?>admin/post-delete?id=<?=$post_id?>" enctype="multipart/form-data">
    <div class="admin-form__item">
      <h2 class="heading">Удалить пост</h2>
    </div>

    <div class="admin-form__item">
      <label class="input__label">Вы действительно хотите удалить пост <br><?=$post_title?>?</label>
    </div>

    <div class="admin-form__item buttons">
      <button class="primary-button" type="submit" name="post-delete">Да, удалить</button>
      <a class="secondary-button" href="<?=HOST?>admin/blog">Отмена</a>
    </div>
    <div class="admin-form__item"></div>
    <div class="admin-form__item"></div>
  </form>
</div>

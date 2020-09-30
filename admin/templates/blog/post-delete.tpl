<div class="admin-page__content-form">
  <form class="admin-form" method="POST" action="<?=HOST?>admin/post-delete?id=<?=htmlentities($post_id)?>">
    <div class="admin-form__item">
      <h2 class="heading mb-20">Удалить пост</h2>
    </div>

    <p class="mb-30">Вы действительно хотите удалить пост <span style="font-size: 21px"><b><i>"<?=htmlentities($post_to_delete_title)?>"</i></b></span>  ? </p>

    <div class="admin-form__item buttons">
      <button class="primary-button primary-button--red" type="submit" name="post-delete">Да, удалить</button>
      <a class="secondary-button" href="<?=HOST?>admin/blog">Отмена</a>
    </div>
    <div class="admin-form__item"></div>
    <div class="admin-form__item"></div>
  </form>
</div>

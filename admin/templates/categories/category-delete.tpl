<div class="admin-page__content-form">
  <form class="admin-form" method="POST" action="<?=HOST?>admin/category-delete?id=<?=htmlentities($category_id)?>">
    <div class="admin-form__item">
      <h2 class="heading mb-20">Удалить категорию</h2>
    </div>

    <p class="mb-30">Вы действительно хотите удалить категорию <span style="font-size: 21px"><b><i>"<?=htmlentities($category_to_delete_name)?>"</i></b></span>  ? </p>

    <div class="admin-form__item buttons">
      <button class="primary-button primary-button--red" type="submit" name="delete-category">Да, удалить</button>
      <a class="secondary-button" href="<?=HOST?>admin/categories">Отмена</a>
    </div>
    <div class="admin-form__item"></div>
    <div class="admin-form__item"></div>
  </form>
</div>

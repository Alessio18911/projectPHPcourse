<div class="admin-page__content-form">
  <form class="admin-form" method="POST" action="<?=HOST?>admin/category-edit?id=<?=$_GET['id']?>">
    <div class="admin-form__item">
      <h2 class="heading">Редактировать категорию</h2>
    </div>

    <?php include ROOT . "admin/templates/components/errors.tpl" ?>
    <?php include ROOT . "admin/templates/components/success.tpl" ?>

    <div class="admin-form__item">
      <label class="input__label">Введите название категории <input class="input input--width-label" type="text" name="category_to_edit_name" placeholder="Заголовок категории" value="<?=$category_to_edit_name?>"/>
      </label>
    </div>

    <div class="admin-form__item buttons">
      <button class="primary-button" type="submit" name="edit_category">Сохранить изменения</button>
      <a class="secondary-button" href="<?=HOST?>admin/categories">Отмена</a>
    </div>
    <div class="admin-form__item"></div>
    <div class="admin-form__item"></div>
  </form>
  </div>



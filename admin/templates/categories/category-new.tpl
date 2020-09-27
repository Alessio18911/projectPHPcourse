<div class="admin-page__content-form">
  <form class="admin-form" method="POST" action="<?=HOST?>admin/category-new">
    <div class="admin-form__item">
      <h2 class="heading">Добавить категорию</h2>
    </div>

    <?php include ROOT . "admin/templates/components/errors.tpl" ?>
    <?php include ROOT . "admin/templates/components/success.tpl" ?>

    <div class="admin-form__item">
      <label class="input__label">Введите название категории <input class="input input--width-label" type="text" name="category_name" placeholder="Заголовок категории" value="<?=$category_name?>"/>
      </label>
    </div>

    <div class="admin-form__item buttons">
      <button class="primary-button" type="submit" name="create_category">Создать</button>
      <a class="secondary-button" href="<?=HOST?>admin/categories">Отмена</a>
    </div>
    <div class="admin-form__item"></div>
    <div class="admin-form__item"></div>
  </form>
</div>


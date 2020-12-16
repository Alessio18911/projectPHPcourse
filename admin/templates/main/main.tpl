<div class="admin-page__content-form">
  <div class="admin-form" style="width: 900px;">
    <?php include ROOT . 'admin/templates/components/errors.tpl' ?>
    <?php include ROOT . 'admin/templates/components/success.tpl' ?>

    <div class="admin-form__item d-flex justify-content-between mb-20">
      <h1>Админ панель</h1>
    </div>

    <div class="dashboard">
      <section class="dashboard-item">
        <div class="dashboard-item__title">
          <a href="<?=HOST?>admin/blog">Записей в блоге</a>
        </div>
        <div class="dashboard-item__value"><?=$posts_count?></div>
        <div class="dashboard-item__action">
          <a href="<?=HOST?>admin/post-new" class="secondary-button">Добавить пост</a>
        </div>
      </section>

      <section class="dashboard-item">
        <div class="dashboard-item__title">
          <a href="<?=HOST?>admin/categories">Категории  в блоге</a>
        </div>
        <div class="dashboard-item__value"><?=$categories_count?></div>
        <div class="dashboard-item__action">
          <a href="<?=HOST?>admin/category-new" class="secondary-button">Добавить категорию</a>
        </div>
      </section>

      <section class="dashboard-item">
        <div class="dashboard-item__title">Комментариев</div>
        <div class="dashboard-item__value"><?=$comments_count?></div>
      </section>

      <section class="dashboard-item">
        <div class="dashboard-item__title">Пользователей</div>
        <div class="dashboard-item__value"><?=$users_count?></div>
      </section>

      <section class="dashboard-item">
        <div class="dashboard-item__title"><a href="<?=HOST?>admin/messages">Cообщений</a></div>
        <div class="dashboard-item__value"><?=$messages_count?></div>
      </section>
    </div>
  </div>
</div>

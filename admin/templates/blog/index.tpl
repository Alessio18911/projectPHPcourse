<div class="admin-page__content-form">
  <div class="admin-form" style="width: 900px;">
    <?php include ROOT . "admin/templates/components/errors.tpl" ?>
    <?php include ROOT . "admin/templates/components/success.tpl" ?>

    <div class="admin-form__item d-flex justify-content-between mb-20">
      <h2 class="heading">Блог - все записи</h2><a class="secondary-button" href="<?=HOST?>admin/post-new">Добавить запись</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Название</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($posts as $post): ?>
          <tr>
          <td><?=htmlentities($post['id'])?></td>
            <td><a href="<?=HOST?>admin/post-edit?id=<?=htmlentities($post['id'])?>"><?=htmlentities($post['title'])?></a></td>
            <td><a class="icon-delete" href="<?=HOST?>admin/post-delete?id=<?=htmlentities($post['id'])?>"></a></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
    <div class="admin-form__item pt-40">
      <?php include ROOT . 'templates/_page-parts/_pagination/_pagination.tpl' ?>
    </div>
  </div>
</div>

<div class="admin-page__content-form">
  <div class="admin-form" style="width: 900px;">
    <div class="admin-form__item d-flex justify-content-between mb-20">
      <h2 class="heading">Фотогалерея</h2>
    </div>
    <?php include ROOT . "admin/templates/components/errors.tpl" ?>
    <?php include ROOT . "admin/templates/components/success.tpl" ?>

    <form class="admin-page__photogallery photogallery" action="<?=HOST?>admin/photogallery" method="POST">
      <?php foreach($files as $dir => $images): ?>
          <div class="photogallery__folder <?=$dir != 'avatars' ? 'photogallery__folder--not-avatars' : '' ?>">
            <h3 class="photogallery__folder-name"><?=$dir?></h3>
            <div class="photogallery__item-wrapper">
              <?php foreach($images as $index => $image): ?>
                <div class="photogallery__image-wrapper">
                  <div class="photogallery__image <?=$dir == 'avatars' ? 'photogallery__image--avatars' : '' ?>">
                    <img src="<?=HOST . 'usercontent/' . $dir . '/' . $image ?>" alt="">
                  </div>
                  <div class="photogallery__checkbox">
                    <label class="photogallery__checkbox-label">
                      <input class="photogallery__checkbox-btn" type="checkbox" id="<?=preg_replace('/\.\D+$/', '', $image);?>" name="<?=preg_replace('/\.\D+$/', '', $image);?>">
                      <span>Удалить</span>
                    </label>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
      <?php endforeach; ?>
      <div class="admin-form__item buttons">
        <button class="primary-button primary-button--red" type="submit" name="photo_delete">Удалить выбранные изображения</button>
        <a class="secondary-button" href="<?=HOST?>admin">Отмена</a>
      </div>
    </form>
  </div>
</div>

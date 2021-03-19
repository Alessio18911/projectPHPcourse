<div class="admin-page__content-form">
  <div class="admin-form" style="width: 900px;">
    <div class="admin-form__item d-flex justify-content-between mb-20">
      <h2 class="heading">Фотогалерея</h2>
    </div>
    <?php include ROOT . "admin/templates/components/errors.tpl" ?>
    <?php include ROOT . "admin/templates/components/success.tpl" ?>

    <div class="admin-page__photogallery photogallery">
      <?php foreach($files as $dir => $images): ?>
          <div class="photogallery__folder">
            <h3 class="photogallery__folder-name"><?=$dir?></h3>
            <div class="swiper-container">
              <div class="photogallery__item-wrapper">
                <?php foreach($images as $image): ?>
                  <div class="photogallery__image <?=$dir == 'avatars' ? 'photogallery__image--avatars' : '' ?>">
                    <img src="<?=HOST . 'usercontent/' . $dir . '/' . $image ?>" alt="">
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

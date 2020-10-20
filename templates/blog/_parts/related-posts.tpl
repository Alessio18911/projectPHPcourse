<!-- связанные поста - начало -->
<?php if($random_related_posts): ?>
  <section class="page-post__see-also">
    <div class="container">
      <div class="page-post__title">
        <h2 class="heading">Смотрите также </h2>
      </div>
      <div class="row">
        <!-- вывод карточки поста - начало -->
          <?php foreach($random_related_posts as $post): ?>
            <div class="col-4">
              <div class="card-post">
                <div class="card-post__img">
                  <a href="<?=HOST . 'single-post/' . htmlentities($post['id'])?>">
                    <img src="<?=HOST?>usercontent/blog/<?=isset($post['cover_small']) ? $post['cover_small'] : 'blog-no-photo.png';?>" alt="<?=htmlentities($post['title'])?>" />
                  </a>
                </div>
                <h4 class="card-post__title">
                  <a href="<?=HOST . 'single-post/' . htmlentities($post['id'])?>"><?=htmlentities($post['title'])?></a>
                </h4>
              </div>
            </div>
          <?php endforeach; ?>
        <!-- вывод карточки поста - конец -->
      </div>
    </div>
  </section>
<?php endif; ?>
<!-- связанные посты - конец -->

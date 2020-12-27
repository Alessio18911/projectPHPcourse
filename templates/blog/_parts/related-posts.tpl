<!-- связанные поста - начало -->
<?php if($random_related_posts): ?>
  <section class="page-post__see-also">
    <div class="container">
      <div class="page-post__title">
        <h2 class="heading">Смотрите также </h2>
      </div>
      <div class="row">
        <!-- вывод карточки поста - начало -->
          <?php foreach($random_related_posts as $post):
            include ROOT . 'templates/_parts/_blog-card.tpl';
          endforeach; ?>
        <!-- вывод карточки поста - конец -->
      </div>
    </div>
  </section>
<?php endif; ?>
<!-- связанные посты - конец -->

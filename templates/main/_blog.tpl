<section class="main-page__posts-cards">
  <div class="main-page__posts-cards-title">
    <h2 class="heading">Новые записи в <a href="<?=HOST?>blog">блоге</a>
    </h2>
  </div>
  <div class="row">
    <?php foreach($new_posts as $post):
      include ROOT . 'templates/_parts/_blog-card.tpl';
    endforeach; ?>
  </div>
</section>

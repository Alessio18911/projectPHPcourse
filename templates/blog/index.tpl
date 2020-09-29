<main class="page-blog">
  <div class="container">
    <div class="page-blog__header">
      <h2 class="heading mb-20">Блог </h2>
      <?php if(!empty($is_category_valid)):?>
        <a class="badge">Категория: <?=$category_name?></a>
      <?php endif; ?>
    </div>
    <?php if($is_category_set && !$is_category_valid): ?>
      <div class="section">
        <div class="container">
          <div class="section__title">
            <h2 class="heading mb-15">Такой категории не существует</h2>
            <p><a href="<?=HOST?>blog">Показать все посты</a></p>
          </div>
        </div>
      </div>
    <?php else: ?>
      <div class="page-blog__posts">
        <?php foreach($posts as $post): ?>
          <div class="card-post">
            <div class="card-post__img">
              <a href="<?=HOST . 'single-post/' . $post['id']?>">
                <img src="<?=HOST?>usercontent/blog/<?=isset($post['cover_small']) ? $post['cover_small'] : 'blog-no-photo.png';?>"
                  alt="<?=$post['title']?>" />
              </a>
            </div>
            <h4 class="card-post__title">
              <a href="<?=HOST . 'single-post/' . $post['id']?>"><?=$post['title']?></a>
            </h4>
          </div>
        <?php endforeach ?>
      </div>
      <div class="page-blog__pagination">
        <?php include ROOT . 'templates/_page-parts/_pagination/_pagination.tpl' ?>
      </div>
    <?php endif; ?>
  </div>
</main>

<main class="page-blog">
  <div class="container">
    <div class="page-blog__header">
      <h2 class="heading mb-20">Блог </h2>
      <?php if(!empty($category_id)):?>
        <a class="badge">Категория: <?=htmlentities($category_name)?></a>
      <?php endif; ?>
    </div>
    <?php if(isset($uri_cat) && isset($uri_get) && !$category_id): ?>
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
              <a href="<?=HOST . 'single-post/' . htmlentities($post['id'])?>">
                <img src="<?=HOST?>usercontent/blog/<?=isset($post['cover_small']) ? $post['cover_small'] : 'blog-no-photo.png';?>"
                  alt="<?=htmlentities($post['title'])?>" />
              </a>
            </div>
            <h4 class="card-post__title">
              <a href="<?=HOST . 'single-post/' . htmlentities($post['id'])?>"><?=htmlentities($post['title'])?></a>
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

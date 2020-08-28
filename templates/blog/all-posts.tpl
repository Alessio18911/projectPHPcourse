<main class="page-blog">
  <div class="container">
    <div class="page-blog__header">
      <h2 class="heading">Блог </h2>
    </div>
    <div class="page-blog__posts">
      <?php foreach($posts as $post): ?>
        <div class="card-post">
          <div class="card-post__img">
            <a href="<?=HOST . 'blog/' . $post['id']?>">
              <img src="<?=HOST?>usercontent/blog/<?=isset($post['cover_small']) ? $post['cover_small'] : 'blog-no-photo.png';?>"
                alt="<?=$post['title']?>" />
            </a>
          </div>
          <h4 class="card-post__title">
            <a href="<?=HOST . 'blog/' . $post['id']?>"><?=$post['title']?></a>
          </h4>
          <p><?=$post['content']?></p><!-- убрать после завершения пагинации -->
        </div>
      <?php endforeach ?>
    </div>
    <div class="page-blog__pagination">
      <?php include ROOT . 'templates/_page-parts/_pagination.tpl' ?>
    </div>
  </div>
</main>

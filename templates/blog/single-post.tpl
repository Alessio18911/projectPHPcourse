<main class="page-post">
  <?php if(isset($uri_get) && isset($post)): ?>
    <section class="page-post__post">
      <div class="section-posts">
        <div class="section-posts__title">
          <h1 class="heading"><?=htmlentities($post['title'])?></h1>
        </div>
        <div class="section-posts__info">
          <span><?=$post_date?></span>
          <a class="badge" href="<?=HOST?>blog/category/<?=htmlentities($post['category_id'])?>"><?=htmlentities($category_name)?></a>
        </div>
        <?php if (isset($post['cover'])): ?>
          <div class="section-posts__img">
            <img src="<?=HOST . 'usercontent/blog/' . $post['cover']?>" alt="<?=htmlentities($post['title'])?>" />
          </div>
        <?php endif ?>
        <div class="section-posts__content">
          <?=$post['content']?>
        </div>
      </div>
      <div class="page-post__post-pagination">
        <?php include ROOT . 'templates/_page-parts/_pagination/_pagination_back_forward.tpl' ?>
      </div>
    </section>
    <section class="page-post__comments">
      <?php include ROOT . "templates/components/comments.tpl"?>
    </section>
    <?php if($is_logged): ?>
      <section class="page-post__post-comments">
        <?php include ROOT . "templates/components/comments-form.tpl"?>
      </section>
    <?php endif; ?>
  <?php else: ?>
    <div class="section">
        <div class="container">
          <div class="section__title">
            <h2 class="heading mb-15">Такого поста не существует</h2>
            <p><a href="<?=HOST?>blog">Показать все посты</a></p>
          </div>
        </div>
      </div>
  <?php endif; ?>
  <section class="page-post__see-also">
    <div class="container">
      <div class="page-post__title">
        <h2 class="heading">Смотрите также </h2>
      </div>
      <div class="row">
        <div class="col-4">
          <div class="card-post">
            <div class="card-post__img"><a href="#"><img src="<?=HOST?>static/img/posts/post-10.jpg" alt="Как устроена подземка в NY. Плюсы и минусы" /></a></div>
            <h4 class="card-post__title"><a href="#"> Как устроена подземка в NY. Плюсы и минусы</a></h4>
          </div>
        </div>
        <div class="col-4">
          <div class="card-post">
            <div class="card-post__img"><a href="#"><img src="<?=HOST?>static/img/posts/post-11.jpg" alt="Летние воспоминания. Трекинг поход по Кавказским горам" /></a></div>
            <h4 class="card-post__title"><a href="#"> Летние воспоминания. Трекинг поход по Кавказским горам</a></h4>
          </div>
        </div>
        <div class="col-4">
          <div class="card-post">
            <div class="card-post__img"><a href="#"><img src="<?=HOST?>static/img/posts/post-12.jpg" alt="Купил дрон. Впечатления и фотосессия " /></a></div>
            <h4 class="card-post__title"><a href="#"> Купил дрон. Впечатления и фотосессия </a></h4>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

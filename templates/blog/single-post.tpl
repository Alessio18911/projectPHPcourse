<main class="page-post">
  <!-- вывод единичного поста - начало -->
  <?php if(isset($uri_get) && isset($post)): ?>
    <!-- собственно единичный пост - начало -->
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
    <!-- собственно единичный пост - конец -->

    <!-- комментарии к посту - начало -->
    <section class="page-post__comments">
      <?php if(!empty($comments)): ?>
        <div class="section__title">
          <h2 class="heading"><?=$comments_amount?> <?=$comments_word?></h2>
        </div>
        <?php include ROOT . "templates/components/comments.tpl"?>
      <?php endif; ?>
    </section>
    <!-- комментарии к посту - конец -->

    <!-- форма добавления комментария - начало -->
    <?php if($is_logged): ?>
      <section class="page-post__post-comments">
        <?php include ROOT . "templates/components/comments-form.tpl"?>
      </section>
    <?php endif; ?>
    <!-- форма добавления комментария - конец -->

    <!-- связанные посты - начало -->
    <?php include ROOT . "templates/blog/_parts/related-posts.tpl"?>
    <!-- связанные посты - конец -->
  <!-- вывод единичного поста - конец -->

  <!-- вывод при отсутствии поста - начало -->
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
  <!-- вывод при отсутствии поста - конец -->
</main>

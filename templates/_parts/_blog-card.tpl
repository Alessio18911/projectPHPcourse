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

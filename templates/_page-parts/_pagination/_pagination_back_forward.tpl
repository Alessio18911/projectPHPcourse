<div class="post-pagination">
  <a class="post-pagination__button <?=$uri_get == $first_post_id ? 'post-pagination__button--disabled' : ''?>"
      href="<?=HOST?>single-post/<?=$prev_post_id?>">
        Назад
  </a>
  <a class="post-pagination__button post-pagination__button--forward
          <?=$uri_get == $last_post_id ? 'post-pagination__button--disabled' : ''?>"
      href="<?=HOST?>single-post/<?=$next_post_id?>">
        Вперед
  </a>
</div>


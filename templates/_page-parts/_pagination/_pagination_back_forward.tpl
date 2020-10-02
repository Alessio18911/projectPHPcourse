<div class="post-pagination">
  <a class="post-pagination__button <?=$post_id == $first_post_id ? 'post-pagination__button--disabled' : ''?>"
      href="<?=HOST?>single-post/<?=$prev_post_id?>">
        Назад
  </a>
  <a class="post-pagination__button post-pagination__button--forward
          <?=$post_id == $last_post_id ? 'post-pagination__button--disabled' : ''?>"
      href="<?=HOST?>single-post/<?=$next_post_id?>">
        Вперед
  </a>
</div>


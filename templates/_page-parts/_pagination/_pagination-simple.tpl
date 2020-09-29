<?php if($pages_count > 1): ?>
  <?php for($page = 1; $page <= $pages_count; $page++): ?>
    <div class="section-pagination__item">
      <a class="pagination-button <?=$page_number == $page ? 'active' : '' ?>"
          href="?page=<?=$page?>">
        <?=$page?>
      </a>
    </div>
  <?php endfor ?>
<?php endif; ?>

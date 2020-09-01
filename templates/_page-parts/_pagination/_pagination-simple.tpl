<?php for($page = 1; $page <= $pagination['pages_count']; $page++): ?>
  <div class="section-pagination__item">
    <a class="pagination-button <?=$pagination['page_number'] == $page ? 'active' : '' ?>"
        href="?page=<?=$page?>">
      <?=$page?>
    </a>
  </div>
<?php endfor ?>

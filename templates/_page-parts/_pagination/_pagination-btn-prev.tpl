<?php if($pagination['page_number'] != 1): ?>
  <div class="section-pagination__item">
    <a class="pagination-button" href="?page=<?=$pagination['page_number']-1?>">назад</a>
  </div>
<?php endif ?>

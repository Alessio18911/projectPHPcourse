<?php if($pagination['page_number'] < $pagination['pages_count']): ?>
  <div class="section-pagination__item">
    <a class="pagination-button" href="?page=<?=$pagination['page_number']+1?>">вперед</a>
  </div>
<?php endif ?>

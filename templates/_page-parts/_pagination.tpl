<div class="section-pagination">
  <?php if($page_number != 1): ?>
  <div class="section-pagination__item">
    <a class="pagination-button" href="?page=<?=$page_number-1?>">назад</a>
  </div>
  <?php endif ?>
  <?php for($page = 1; $page <= $pages_count; $page++): ?>
    <div class="section-pagination__item">
      <a class="pagination-button <?=$page_number == $page ? 'active' : '' ?>"
          href="?page=<?=$page?>">
        <?=$page?>
      </a>
    </div>
  <?php endfor ?>
  <?php if($page_number < $pages_count): ?>
  <div class="section-pagination__item">
    <a class="pagination-button" href="?page=<?=$page_number+1?>">вперед</a>
  </div>
  <?php endif ?>
</div>

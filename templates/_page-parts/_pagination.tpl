<div class="section-pagination">
  <?php if($page_number != 1): ?>
    <div class="section-pagination__item">
      <a class="pagination-button" href="?page=<?=$page_number-1?>">назад</a>
    </div>
  <?php endif ?>

  <?php if($pages_count < 6): ?>
    <?php for($page = 1; $page <= $pages_count; $page++): ?>
      <div class="section-pagination__item">
        <a class="pagination-button <?=$page_number == $page ? 'active' : '' ?>"
            href="?page=<?=$page?>">
          <?=$page?>
        </a>
      </div>
    <?php endfor ?>
  <?php else: ?>
    <?php if($page_number-3 > 1): ?>
      <div class="section-pagination__item">
        <a class="pagination-button" href="page=1">1</a>
      </div>
      <div class="section-pagination__item">
        <a class="pagination-button" href="?page=<?=$page_number-3?>">...</a>
      </div>
    <?php endif ?>
    <?php if($page_number-2 > 0): ?>
      <div class="section-pagination__item">
        <a class="pagination-button" href="?page=<?=$page_number-2?>"><?=$page_number-2?></a>
      </div>
    <?php endif ?>
    <?php if($page_number-1 > 0): ?>
      <div class="section-pagination__item">
        <a class="pagination-button" href="?page=<?=$page_number-1?>"><?=$page_number-1?></a>
      </div>
    <?php endif ?>
    <div class="section-pagination__item">
      <a class="pagination-button active" href="?page=<?=$page_number?>"><?=$page_number?></a>
    </div>
    <?php if($page_number+1 <= $pages_count): ?>
      <div class="section-pagination__item">
        <a class="pagination-button" href="?page=<?=$page_number+1?>"><?=$page_number+1?></a>
      </div>
    <?php endif ?>
    <?php if($page_number+2 <= $pages_count): ?>
      <div class="section-pagination__item">
        <a class="pagination-button" href="?page=<?=$page_number+2?>"><?=$page_number+2?></a>
      </div>
    <?php endif ?>
    <?php if($page_number+3 <= $pages_count): ?>
      <div class="section-pagination__item">
        <a class="pagination-button" href="?page=<?=$page_number+3?>">...</a>
      </div>
    <?php endif ?>
  <?php endif ?>

  <?php if($page_number < $pages_count): ?>
    <div class="section-pagination__item">
      <a class="pagination-button" href="?page=<?=$page_number+1?>">вперед</a>
    </div>
  <?php endif ?>
</div>

<?php if($pagination['page_number']-3 > 1): ?>
  <div class="section-pagination__item">
    <a class="pagination-button" href="?page=1">1</a>
  </div>
  <div class="section-pagination__item">
    <a class="pagination-button" href="?page=<?=$pagination['page_number']-3?>">...</a>
  </div>
<?php endif ?>

<?php if($pagination['page_number']-2 > 0): ?>
  <div class="section-pagination__item">
    <a class="pagination-button" href="?page=<?=$pagination['page_number']-2?>"><?=$pagination['page_number']-2?></a>
  </div>
<?php endif ?>

<?php if($pagination['page_number']-1 > 0): ?>
  <div class="section-pagination__item">
    <a class="pagination-button" href="?page=<?=$pagination['page_number']-1?>"><?=$pagination['page_number']-1?></a>
  </div>
<?php endif ?>

<div class="section-pagination__item">
  <a class="pagination-button active" href="?page=<?=$pagination['page_number']?>"><?=$pagination['page_number']?></a>
</div>

<?php if($pagination['page_number']+1 <= $pagination['pages_count']): ?>
  <div class="section-pagination__item">
    <a class="pagination-button" href="?page=<?=$pagination['page_number']+1?>"><?=$pagination['page_number']+1?></a>
  </div>
<?php endif ?>

<?php if($pagination['page_number']+2 <= $pagination['pages_count']): ?>
  <div class="section-pagination__item">
    <a class="pagination-button" href="?page=<?=$pagination['page_number']+2?>"><?=$pagination['page_number']+2?></a>
  </div>
<?php endif ?>

<?php if($pagination['page_number']+3 <= $pagination['pages_count']): ?>
  <div class="section-pagination__item">
    <a class="pagination-button" href="?page=<?=$pagination['page_number']+3?>">...</a>
  </div>
<?php endif ?>

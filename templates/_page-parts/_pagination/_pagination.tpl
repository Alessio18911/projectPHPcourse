<div class="section-pagination">
  <?php
    include ROOT . 'templates/_page-parts/_pagination/_pagination-btn-prev.tpl';

    if($pages_count < 6) {
      include ROOT . 'templates/_page-parts/_pagination/_pagination-simple.tpl';
    } else {
      include ROOT . 'templates/_page-parts/_pagination/_pagination_with_ellipsis.tpl';
    }

    include ROOT . 'templates/_page-parts/_pagination/_pagination-btn-next.tpl';
  ?>
</div>

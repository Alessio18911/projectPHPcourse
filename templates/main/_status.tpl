<?php if(!empty($status_checkbox)): ?>
<section class="main-page__section-status">
  <a class="section-status" href="<?=$status_page_link?>">
    <div class="section-status-badge"><?=$status?></div>
    <div class="section-status-text"><?=$status_detailed?></div>
  </a>
</section>
<?php endif; ?>

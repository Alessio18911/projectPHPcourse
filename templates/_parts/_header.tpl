<?php include ROOT . "templates/_parts/_admin-panel.tpl" ?>

<header class="section-header">
  <div class="section-header__content">
    <a href="http://projectphpcourse/">
      <h2 class="section-header__content-title">Digital Nomad</h2>
      <p class="section-header__content-subtitle">cайт IT специалиста</p>
    </a>
    <nav class="nav">
      <ul class="nav__list">
        <li class="nav__list-item"><a class="nav__list-item-link <?=$page_title == 'Обо мне' ? 'nav__list-item-link--active' : ''?>" href="about.html">Обо мне</a></li>
        <li class="nav__list-item"><a class="nav__list-item-link <?=$page_title == 'Портфолио' ? 'nav__list-item-link--active' : ''?>" href="portfolio.html">Портфолио</a></li>
        <li class="nav__list-item"><a class="nav__list-item-link <?=$page_title == 'Блог' ? 'nav__list-item-link--active' : ''?>" href="<?=HOST?>blog">Блог</a></li>
        <li class="nav__list-item"><a class="nav__list-item-link <?=$page_title == 'Контакты' ? 'nav__list-item-link--active' : ''?>" href="<?=HOST?>contacts">Контакты</a></li>
      </ul>
    </nav>
  </div>
</header>

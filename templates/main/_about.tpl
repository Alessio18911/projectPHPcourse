<section class="main-page__section-about">
  <div class="section-about-main">
    <div class="container">
      <div class="row">
        <div class="section-about-main__img"><img src="<?=HOST?>static/img/section-about-main/section-about-main.jpg" alt="Изображение" /></div>
        <div class="section-about-main__wrapper">
          <div class="section-about-main__content">
            <div class="post-about-me">
              <h4 class="post-about-me__title"><?=$about_me_title?></h4>
              <p><?=$about_me_content?></p>
            </div>
          </div>
          <div class="post-about-skills">
            <h4 class="post-about-skills__title"><?=$my_skills_title?></h4>
            <div class="skills__list">
              <?=$my_skills_content?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

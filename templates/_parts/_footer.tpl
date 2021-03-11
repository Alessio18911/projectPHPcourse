<footer class="section-footer">
  <div class="container">
    <div class="row">
      <div class="col section-footer__copyright">
        <p><?=$copyrights_author?></p>
        <p><?=$copyrights_year?></p>
      </div>
      <div class="col section-social-icons">
        <?php if(isset($social_yt)): ?>
          <div class="footer-icons">
            <a href="<?=$social_yt?>">
              <img src="<?=HOST?>static/img/favicons/youtube-brands.svg" alt="Youtube" width="30" height="21" />
            </a>
          </div>
        <?php endif; ?>
        <?php if(isset($social_insta)): ?>
          <div class="footer-icons">
            <a href="<?=$social_insta?>">
              <img src="<?=HOST?>static/img/favicons/instagram.svg" alt="instagram" width="24" height="26" />
            </a>
          </div>
        <?php endif; ?>
        <?php if(isset($social_fb)): ?>
          <div class="footer-icons">
            <a href="<?=$social_fb?>">
              <img src="<?=HOST?>static/img/favicons/facebook.svg" alt="facebook" width="18" height="28" />
            </a>
          </div>
        <?php endif; ?>
        <?php if(isset($social_vk)): ?>
          <div class="footer-icons">
            <a href="<?=$social_vk?>">
              <img src="<?=HOST?>static/img/favicons/vk.svg" alt="vk" width="30" height="18" />
            </a>
          </div>
        <?php endif; ?>
        <?php if(isset($social_in)): ?>
          <div class="footer-icons">
            <a href="<?=$social_in?>">
              <img src="<?=HOST?>static/img/favicons/linkedin.svg" alt="linkedin" width="25" height="28" />
            </a>
          </div>
        <?php endif; ?>
        <?php if(isset($social_github)): ?>
          <div class="footer-icons">
            <a href="<?=$social_github?>">
              <img src="<?=HOST?>static/img/favicons/github-brands.svg" alt="github-brands" width="27" height="28" />
            </a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</footer>

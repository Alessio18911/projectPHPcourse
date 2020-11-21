<main class="page-contacts">
  <div class="section-about-contacts">
    <div class="container">
      <div class="row">
        <?php include ROOT . "templates/contacts/_parts/_about.tpl"?>
        <?php include ROOT . "templates/contacts/_parts/_services.tpl"?>
      </div>
    </div>
  </div>
  <section class="page-contacts__feedback">
    <div class="container">
      <div class="row">
        <div class="col-6">
          <?php include ROOT . "templates/contacts/_parts/_contacts.tpl"?>
        </div>
        <div class="col-6">
          <?php include ROOT . "templates/contacts/_parts/_contact-form.tpl"?>
        </div>
      </div>
    </div>
  </section>
  <div class="page-contacts__map" id="map">
    <img src="<?=HOST?>static/img/contacts/map.jpg" alt="map" />
  </div>
</main>
<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A0a445eecd07b59fdc916372a1f5c4f4b5cbf83e53eb25be53ae332f394390925&amp;width=100%25&amp;height=708&amp;id=map&amp;lang=ru_RU&amp;scroll=true"></script>

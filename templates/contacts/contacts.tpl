<main class="page-contacts">
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
<?=$interactive_map?>

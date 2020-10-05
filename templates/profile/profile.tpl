<main class="page-profile">
  <?php if($is_logged || isset($user_id_param)): ?>
    <?php if(!empty($user_id)): ?>
      <div class="section">
        <div class="container">
          <div class="section__title">
            <h2 class="heading">Профиль пользователя </h2>
            <?php include ROOT . "templates/components/errors.tpl" ?>
            <?php include ROOT . "templates/components/success.tpl" ?>
          </div>
          <div class="section__body">
            <?php if(!$user_name): ?>
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="enter-or-reg flex-column">
                    <div class="enter-or-reg__text">
                      😒 Пустой профиль
                    </div>
                    <?php include ROOT . "templates/_parts/_button-edit-profile.tpl" ?>
                  </div>
                </div>
              </div>
            <?php else: ?>
              <div class="row justify-content-center">
                <div class="col-md-2">
                  <?php include ROOT . "templates/_parts/_big-avatar.tpl" ?>
                </div>
                <div class="col-md-4">
                  <div class="definition-list mb-20">
                    <?php if($user_name): ?>
                      <dl class="definition">
                        <dt class="definition__term">имя и фамилия</dt>
                        <dd class="definition__description"> <?=$user->name?> <?=$user->surname?></dd>
                      </dl>
                    <?php endif ?>
                    <?php if($user_country || $user_city): ?>
                      <dl class="definition">
                        <dt class="definition__term">
                          <?php if($user_country): ?>Страна<?php endif ?><?php if($user_country && $user_city): ?>, <?php endif ?><?php if($user_city): ?>город<?php endif ?>
                        </dt>
                        <dd class="definition__description">
                          <?=$user_country?><?php if($user_country && $user_city): ?>, <?php endif ?><?=$user_city?>
                        </dd>
                      </dl>
                    <?php endif ?>
                  </div>
                    <?php include ROOT . "templates/_parts/_button-edit-profile.tpl" ?>
                </div>
              </div>
            <?php endif ?>
          </div>
        </div>
      </div>
      <?php if(!empty($comments)): ?>
        <div class="section bg-grey">
          <div class="container">
              <div class="section__title">
                <h2 class="heading">Комментарии пользователя </h2>
              </div>
              <?php include ROOT . "templates/components/comments.tpl"?>
          </div>
        </div>
      <?php endif; ?>
    <?php else: ?>
      <div class="section">
        <div class="container">
          <div class="section__title">
            <h2 class="heading mb-15">Такого пользователя не существует</h2>
            <p><a href="<?=HOST?>">Вернуться на главную</a></p>
          </div>
        </div>
      </div>
    <?php endif ?>
  <?php else: ?>
    <div class="section">
      <div class="container">
        <div class="section__title">
          <h2 class="heading mb-15">Профиль пользователя</h2>
          <p>Чтобы посмотреть свой профиль
            <a href="<?=HOST?>login">войдите</a>
            либо
            <a href="<?=HOST?>registration">зарегистрируйтесь</a>
          </p>
        </div>
      </div>
    </div>
  <?php endif ?>
</main>

<main class="page-profile">
  <?php if($isLogged || isset($uriGet)): ?>
    <?php if($userId): ?>
      <div class="section">
        <div class="container">
          <div class="section__title">
            <h2 class="heading">Профиль пользователя </h2>
            <?php include ROOT . "templates/components/errors.tpl" ?>
            <?php include ROOT . "templates/components/success.tpl" ?>
          </div>
          <div class="section__body">
            <?php if(!$userName): ?>
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
                    <?php if($userName): ?>
                      <dl class="definition">
                        <dt class="definition__term">имя и фамилия</dt>
                        <dd class="definition__description"> <?=$user->name?> <?=$user->surname?></dd>
                      </dl>
                    <?php endif ?>
                    <?php if($userCountry || $userCity): ?>
                      <dl class="definition">
                        <dt class="definition__term">
                          <?php if($userCountry): ?>Страна<?php endif ?><?php if($userCountry && $userCity): ?>, <?php endif ?><?php if($userCity): ?>город<?php endif ?>
                        </dt>
                        <dd class="definition__description">
                          <?=$userCountry?><?php if($userCountry && $userCity): ?>, <?php endif ?><?=$userCity?>
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
      <div class="section bg-grey">
        <div class="container">
          <div class="section__title">
            <h2 class="heading">Комментарии пользователя </h2>
          </div>
          <div class="section__body">
            <div class="row justify-content-center">
              <div class="col-md-10">
                <div class="comment">
                  <div class="comment__avatar"><a href="#">
                      <div class="avatar-small"><img src="<?=HOST?>static/img/avatars/avatart-rect.jpg" alt="Аватарка" /></div>
                    </a>
                  </div>
                  <div class="comment__data">
                    <div class="comment__user-info">
                      <div class="comment__username">Джон До</div>
                      <div class="comment__date"><img src="<?=HOST?>static/img/favicons/clock.svg" alt="Дата публикации" />05 мая 2017 года 15:45</div>
                    </div>
                    <div class="comment__text">
                      <p>Замечательный парк, обязательно отправлюсь туда этим летом.</p>
                    </div>
                  </div>
                </div>
                <div class="comment">
                  <div class="comment__avatar"><a href="#">
                      <div class="avatar-small"><img src="<?=HOST?>static/img/avatars/avatart-rect.jpg" alt="Аватарка" /></div>
                    </a>
                  </div>
                  <div class="comment__data">
                    <div class="comment__user-info">
                      <div class="comment__username">Джон До</div>
                      <div class="comment__date"><img src="<?=HOST?>static/img/favicons/clock.svg" alt="Дата публикации" />05 мая 2017 года 15:45</div>
                    </div>
                    <div class="comment__text">
                      <p>Замечательный парк, обязательно отправлюсь туда этим летом.</p>
                    </div>
                  </div>
                </div>
                <div class="comment">
                  <div class="comment__avatar"><a href="#">
                      <div class="avatar-small"><img src="<?=HOST?>static/img/avatars/avatart-rect.jpg" alt="Аватарка" /></div>
                    </a>
                  </div>
                  <div class="comment__data">
                    <div class="comment__user-info">
                      <div class="comment__username">Джон До</div>
                      <div class="comment__date"><img src="<?=HOST?>static/img/favicons/clock.svg" alt="Дата публикации" />05 мая 2017 года 15:45</div>
                    </div>
                    <div class="comment__text">
                      <p>Замечательный парк, обязательно отправлюсь туда этим летом.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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

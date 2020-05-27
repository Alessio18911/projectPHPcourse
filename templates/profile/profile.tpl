<main class="page-profile">
<?php if(isset($userNotLoggedIn)): ?>
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
<?php elseif(!$user['id']): ?>
  <div class="section">
    <div class="container">
      <div class="section__title">
        <h2 class="heading mb-15">Такого пользователя не существует</h2>
        <p><a href="<?=HOST?>">Вернуться на главную</a></p>
      </div>
    </div>
  </div>
<?php else: ?>
  <div class="section">
    <div class="container">
      <div class="section__title">
        <h2 class="heading">Профиль пользователя </h2>
      </div>
      <div class="section__body">
        <div class="row justify-content-center">
          <div class="col-md-2">
            <div class="avatar-big"><img src="<?=HOST?>static/img/section-about-me/img-01.jpg" alt="Аватарка" /></div>
          </div>
          <div class="col-md-4">
            <div class="definition-list mb-20">
              <dl class="definition">
                <dt class="definition__term">имя и фамилия</dt>
                <dd class="definition__description"> <?=$user->name?> <?=$user->surname?></dd>
              </dl>
              <dl class="definition">
                <dt class="definition__term">Страна, город</dt>
                <dd class="definition__description"> <? echo $user->country ? $user->country . "," : ''?> <?=$user->city?></dd>
              </dl>
            </div>
            <?php if(isset($_SESSION['isLoggedIn'])): ?>
              <a class="secondary-button" href="<?=HOST?>profile-edit/<?=$btnLink?>">Редактировать</a>
            <?php endif; ?>
          </div>
        </div>
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
<?php endif; ?>
</main>

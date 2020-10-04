<main class="page-profile">
  <?php if (!(int)$user->id): ?>
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
      <div class="section__title">
        <div class="container">
          <h2 class="heading">Редактировать профиль </h2>
        </div>
      </div>
      <div class="section__body">
        <div class="container">
          <form action="<?=HOST?>profile-edit/<?=$user_id?>" method="POST" enctype="multipart/form-data">
            <div class="row justify-content-center">
              <div class="col-md-8">
              <?php include ROOT . "templates/components/errors.tpl" ?>
              <?php include ROOT . "templates/components/success.tpl" ?>
                <div class="form-group">
                  <label class="input__label">Введите имя
                    <input class="input input--width-label"
                      type="text"
                      placeholder="Имя"
                      name="name"
                      value="<?=isset($_POST['name']) ? $_POST['name'] : $user->name; ?>"
                    />
                  </label>
                </div>
                <div class="form-group">
                  <label class="input__label">Введите фамилию
                    <input class="input input--width-label"
                      type="text"
                      placeholder="Фамилия"
                      name="surname"
                      value="<?=isset($_POST['surname']) ? $_POST['surname'] : $user->surname; ?>"
                    />
                  </label>
                </div>
                <div class="form-group">
                  <label class="input__label">Введите email
                    <input class="input input--width-label"
                      type="text"
                      placeholder="Email"
                      name="email"
                      value="<?=isset($_POST['email']) ? $_POST['email'] : $user->email; ?>"
                    />
                  </label>
                </div>
              </div>
            </div>
            <div class="row justify-content-center pt-40 pb-40">
              <div class="col-2">
                <?php include ROOT . "templates/_parts/_big-avatar.tpl"?>
              </div>
              <div class="col-6">
                <div class="block-upload">
                  <div class="block-upload__description">
                    <div class="block-upload__title">Фотография</div>
                    <p>Изображение jpg, jpeg, gif или png, рекомендуемые размеры от  160х160px и выше. Вес до 4Мб.</p>
                    <div class="block-upload__file-wrapper">
                      <input class="file-button" type="file" name="avatar">
                    </div>
                  </div>
                </div>
                <?php if ($user_avatar != 'blank-avatar.svg'): ?>
                  <div class="checkbox__item mt-20">
                    <input class="checkbox__btn visually-hidden" type="checkbox" id="delete-avatar" name="delete-avatar">
                    <label class="checkbox__label delete-button" for="delete-avatar">Удалить фотографию</label>
                  </div>
                <?php endif ?>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="form-group">
                  <label class="input__label">Введите страну
                    <input class="input input--width-label"
                      type="text"
                      placeholder="Страна"
                      name="country"
                      value="<?=isset($_POST['country']) ? $_POST['country'] : $user->country; ?>"
                    />
                  </label>
                </div>
                <div class="form-group">
                  <label class="input__label">Введите город
                    <input class="input input--width-label"
                      type="text"
                      placeholder="Город"
                      name="city"
                      value="<?=isset($_POST['city']) ? $_POST['city'] : $user->city; ?>"
                    />
                  </label>
                </div>
                <div class="form-group form-group--buttons-left">
                  <button name="update-profile" class="primary-button" type="submit">Сохранить</button>
                  <a class="secondary-button" href="<?=HOST?>profile">Отмена</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endif; ?>
</main>

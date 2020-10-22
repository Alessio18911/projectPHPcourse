<div class="admin-page__content-form">
  <div class="admin-form" style="width: 900px;">
    <div class="admin-form__item d-flex justify-content-between mb-20">
      <h2 class="heading">Сообщения</h2>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>От кого</th>
          <th>Email</th>
          <th>Текст</th>
          <th>Файл</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td><a href="<?=HOST?>admin/single-message?id=1">Юрий</a></td>
          <td>juriy@mail.ru</td>
          <td><a href="<?=HOST?>admin/single-message?id=1">Короткий текст сообщения...</a></td>
          <td>photo1.jpg</td>
          <td><a class="icon-delete" href="#"></a></td>
        </tr>
        <tr>
          <td>2</td>
          <td><a href="<?=HOST?>admin/single-message?id=2">Клим</a></td>
          <td>klim@ya.ru</td>
          <td><a href="<?=HOST?>admin/single-message?id=2">Короткий текст сообщения...</a></td>
          <td>photo2.jpg</td>
          <td><a class="icon-delete" href="#"></a></td>
        </tr>
        <tr>
          <td>3</td>
          <td><a href="<?=HOST?>admin/single-message?id=3">Наста</a></td>
          <td>nasta@yahoo.com</td>
          <td><a href="<?=HOST?>admin/single-message?id=3">Короткий текст сообщения...</a></td>
          <td>photo3.jpg</td>
          <td><a class="icon-delete" href="#"></a></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

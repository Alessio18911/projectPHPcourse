<div class="admin-page__content-form">
  <div class="admin-form" style="width: 900px;">
    <div class="admin-form__item d-flex justify-content-between mb-20">
      <h2 class="heading">Сообщения</h2>
    </div>
    <?php include ROOT . "admin/templates/components/errors.tpl" ?>
    <?php include ROOT . "admin/templates/components/success.tpl" ?>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>От кого</th>
          <th>Email</th>
          <th>Текст</th>
          <th>Файл</th>
          <th>Время</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($messages)):
          foreach($messages as $message): ?>
            <tr class="message <?=$message['is_new'] ? 'message--new' : '' ;?>">
              <td><?=$message['id']?></td>
              <td><a href="<?=HOST?>admin/single-message?id=<?=$message['id']?>"><?=$message['name']?></a></td>
              <td><?=$message['email']?></td>
              <td><a href="<?=HOST?>admin/single-message?id=<?=$message['id']?>"><?=$message['message']?></a></td>
              <td>
                <?php if($message['file_name']): ?>
                  <img src="<?=HOST?>static/img/admin-panel/clip.svg" alt="">
                <?php endif; ?>
              </td>
              <td><?=date('j.m.Y, G:i', $message['time'])?></td>
              <td><a class="icon-delete" href="<?=HOST?>admin/messages?message-delete&id=<?=$message['id']?>"></a></td>
            </tr>
          <?php endforeach;
        endif; ?>
      </tbody>
    </table>
  </div>
</div>

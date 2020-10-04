<div class="section__body">
  <?php include ROOT . 'templates/components/errors.tpl' ?>
  <?php include ROOT . 'templates/components/success.tpl' ?>
  <div class="row justify-content-center">
    <div class="col-md-10">
        <?php foreach($comments as $comment): ?>
          <div class="comment">
            <div class="comment__avatar"><a href="<?=HOST?>profile/<?=$comment['user_id']?>">
                <div class="avatar-small"><img src="<?=HOST?>usercontent/avatars/<?=isset($comment['user_avatar']) ? $comment['user_avatar'] : 'blank-avatar.svg' ?>" alt="Аватарка" /></div>
              </a>
            </div>
            <div class="comment__data">
              <div class="comment__user-info">
                <div class="comment__username"><?=htmlentities($comment['user_name'])?> <?=htmlentities($comment['user_surname'])?></div>
                <div class="comment__date"><img src="<?=HOST?>static/img/favicons/clock.svg" alt="Дата публикации" />
                  <?=strtr(date('j F Y, G:i', $comment['timestamp']), $translation_terms)?>
                </div>
                <?php if($uri_module === 'profile'): ?>
                  <div class="comment__to-post"><b>К посту:</b>
                    <a href="<?=HOST?>single-post/<?=$comment['post_id']?>"><?=htmlentities($comment['post_title'])?></a>
                  </div>
                <?php endif; ?>
              </div>
              <div class="comment__text">
                <p><?=htmlentities($comment['comment'])?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
    </div>
  </div>
</div>


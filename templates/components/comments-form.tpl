<div class="page-post__title">
  <h2 class="heading">Оставить комментарий </h2>
</div>
<div class="page-post__comments-post-comment">
  <div class="post-comment">
    <div class="post-comment__avatar"><a href="<?=HOST?>profile">
        <div class="avatar-small"><img src="<?=HOST?>usercontent/avatars/<?=$user_avatar?>" alt="Аватарка" /></div>
      </a>
    </div>
    <form class="post-comment__form" action="<?=HOST?>single-post/<?=htmlentities($post_id)?>" method="POST">
      <div class="post-comment__form-textarea">
        <textarea class="textarea" placeholder="Введите ваш комментарий..." name="user_comment"><?=htmlentities($user_comment)?></textarea>
      </div>
      <div class="post-comment__form-button">
        <button class="primary-button" type="submit" name="submit-comment">Комментировать</button>
      </div>
    </form>
  </div>
</div>

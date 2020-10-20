<?php
$related_posts_amount = R::count('posts', 'WHERE category_id=?', [$category_id]);

// Если связанных постов не более 3-х
if ($related_posts_amount && $related_posts_amount <= 3) {
  $random_related_posts =
  R::getAll('SELECT p.id, p.title, p.cover_small FROM posts AS p WHERE p.category_id = ? AND p.id <> ?', [$category_id, $post_id]);
} else { // если связанных постов больше 3-х
  $post_min_id = (int)R::getCell('SELECT MIN(p.id) FROM posts AS p WHERE p.category_id = ?', [$category_id]);
  $post_max_id = (int)R::getCell('SELECT MAX(p.id) FROM posts AS p WHERE p.category_id = ?', [$category_id]);

  $random_ids = [];
  $random_posts = [];

  // получаем выборку из 3-х случайных id, которые есть в БД
  for ($i = 0; $i < 3; $i++) {
    $random_ids[] = getRandomPostIds($post_min_id, $post_max_id, $random_ids, $category_id, $post_id);
  }

  // получаем посты для вывода в разметку
  foreach($random_ids as $related_post_id) {
    $random_related_posts[] = R::getRow('SELECT p.id, p.title, p.cover_small FROM posts AS p WHERE p.id = ?', [$related_post_id]);
  }
}

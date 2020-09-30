<label class="select-label">Выберите категорию
  <select class="select" name="post-category">
    <?php foreach($categories as $category): ?>
      <option value="<?=htmlentities($category['id'])?>" <?=isset($post_category_id) && $category['id'] == $post_category_id ? 'selected' : '' ?>><?=htmlentities($category['category_name'])?></option>
    <?php endforeach; ?>
  </select>
</label>

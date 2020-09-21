<label class="select-label">Выберите категорию
  <select class="select" name="post-category">
    <?php foreach($categories as $category): ?>
      <option value="<?=$category['id']?>"
        <?=$category['id'] == $post_category_id ? 'selected' : '' ?>
      >
        <?=$category['name']?>
      </option>
    <?php endforeach; ?>
  </select>
</label>

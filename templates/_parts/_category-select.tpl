<label class="select-label">Выберите категорию
  <select class="select" name="post-category">
    <?php foreach($categories as $category): ?>
      <option value="<?=$category['name']?>"
        <?=$category['name'] == $post_category ? 'selected' : '' ?>
      >
        <?=$category['name']?>
      </option>
    <?php endforeach; ?>
  </select>
</label>

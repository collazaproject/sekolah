<div class="page-header">
  <h2><?= $title ?></h2>
</div>

<?php echo validation_errors(); ?>
<?php echo form_open('posts/update'); ?>
  <input type="hidden" name="id_post" value="<?php echo $post['id_blog']; ?>">
  <div class="form-group">
    <label>Titla</label>
    <input type="text" class="form-control" name="title" value="<?php echo $post['title']; ?>">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor1" type="text" class="form-control" name="body" ><?php echo $post['body']; ?></textarea>
  </div>
  <div class="form-group">
    <label>Category </label>
    <select name='category_id' class="form-control">  
      <?php foreach ($categories as $category): ?> 
        <option value="<?php echo $category['id_category']; ?>"> <?php echo $category['category_name']; ?> </option>
      <?php endforeach?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
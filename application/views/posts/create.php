<div class="page-header">
  <h2><?= $title ?></h2>
</div>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('posts/create'); ?>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor1" type="text" class="form-control" name="body" placeholder="Body"></textarea>
  </div>
  <div class="form-group">
    <label>Category </label>
    <select name='category_id' class="form-control">
      <option value="#"> - Select -</option>
    	 <?php foreach ($categories as $category): ?> 
          <option value="<?php echo $category['id_category']; ?>"> <?php echo $category['category_name']; ?> </option>
    	 <?php endforeach?>
    </select>
  </div>
  <div class="form-group">
    <label>Upload Image</label>
    <input type="file" name='userfile' id='userfile' size="20">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
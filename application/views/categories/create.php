<div class="page-header">
  <h2><?= $title ?></h2>
</div>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('categories/create'); ?>
  <div class="form-group"> 
    <label> Name </label>
      <input type="text" name="name" class="form-control" placeholder="input name category"> 
   </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
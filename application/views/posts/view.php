<div class="row">
  <div class="col-md-2">
    <img class="post-thumbs thumbnail"src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image'];?>">
  </div>
  <div class="col-md-9">
    <h5><? echo $post['title']; ?></h5>
    <small><? echo $post['create_dt']; ?></small>
    <p><?echo $post['body']; ?></p>

    <? echo form_open('posts/delete/'.$post['id_blog']); ?>
      <a href="<?php echo site_url('/posts/edit/'.$post['slug']); ?>" class="btn btn-warning pull-left">Edit</a>
      <input type='submit' value='delete' class="btn btn-danger">
    </form>
    
    <hr>
    <h3>Comment</h3>
    <?php if($comments) : ?>
      <?php foreach ($comments as $comment) : ?> 
        <div class="well">
          <?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <p>No Comment Display</p>
    <?php endif; ?>

    <hr>
    <h3>Add Comment</h3>
    <?php echo validation_errors(); ?>
    <?php echo form_open('comments/create/'.$post['id_blog']); ?>
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control">
      </div>
      <div class="form-group">
        <label>Body</label>
        <textarea name="body" class="form-control"></textarea>
        <input type="hidden" name="slug" value="<?php echo $post['slug'];?>">
      </div>
      <button type='submit' class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
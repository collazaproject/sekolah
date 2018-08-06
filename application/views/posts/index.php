<div class="page-header">
  <h2><?= $title ?></h2>
</div>

<?php foreach ($posts as $post): ?>
  <div class="row">
    <div class="col-md-2">
      <img class="post-thumbs thumbnail" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image'];?>">
    </div>
    <div class="col-md-9">
      <h5><? echo $post['title']; ?></h5>
      <small><? echo $post['create_dt']; ?> in <strong> <? echo $post['category_name']; ?></strong></small>
      <p><? echo word_limiter($post['body'],70); ?> <a href="<?php echo site_url('/posts/'.$post['slug']); ?>">more</a></p>
      </hr>
    </div>
  </div>
<?php endforeach ?>

<div class="row">
  <div class="col-md-6 col-md-offset-3">  
    <div class="page-links">
      <?php echo $this->pagination->create_links(); ?> 
    </div>
  </div>
</div>
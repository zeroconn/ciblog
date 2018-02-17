<h2><?php echo $post['title']; ?></h2>
<small class="post-date">Posted On: <?php echo $post['created_at']; ?></small>
<div class="post-body">
<p><?php echo $post['body']; ?></p>
</div>
<hr>
<?php if($this->session->userdata('user_id')==$post['user_id']): ?>
<?php echo form_open('posts/delete/'.$post['id']); ?>
<a href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>" class="btn btn-default pull-left">Edit</a>
<input type="submit" name="delete" value="Delete" class="btn btn-danger">
<?php echo form_close(); ?>
<?php endif; ?>
<hr>
<h3>Comments</h3>
<?php if($comments): ?>
<?php foreach($comments as $comment): ?>
<div class="well">
<h5><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]</h5>
</div>
<?php endforeach; ?>
<?php else: ?>
<p>No Comment To Display</p>
<?php endif; ?>
<hr>
<h3>Add Comment</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$post['id']); ?>

<div class="form-group">
<label>Name</label>
<input type="text" name="name" class="form-control">
</div>

<div class="form-group">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="form-group">
<label>Comment</label>
<textarea name="body" class="form-control"></textarea>
</div>

<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
<button type="submit" class="btn btn-primary">Send</button>

<?php echo form_close(); ?>
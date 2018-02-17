<h1><?php echo $title; ?></h1>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('posts/update'); ?>
<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
  <div class="form-group">
    <label>Title</label>
    <input type="text" value="<?php echo $post['title']; ?>" class="form-control" aria-describedby="emailHelp" name="title" placeholder="Add Title">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor" class="form-control" name="body" placeholder="Add Body"><?php echo $post['body']; ?></textarea>
  </div>
  <div class="form-group">
  	<label>Category</label>
  	<select name="category_id" class="form-control">
<?php foreach($categories as $category): ?>
		<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
<?php endforeach; ?>
  	</select>
  </div>
  <div>
    Movcud foto:
    <img width="100px" src="<?php echo base_url();?>assets/images/posts/<?= $post['post_image']?>" alt="">
    Yeni Foto ile evez edin:
    <input type="file" name="userfile">
    <!-- <a href="/posts/deleteimage/<?=$post['post_image']?>">fotonu sil</a> -->
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
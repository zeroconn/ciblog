<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CI Blog</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootswatch.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
	<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a href="<?php echo base_url();?>" class="navbar-brand">CI Blog</a>
				<a href="<?php echo base_url(); ?>" class="navbar-brand">| Home |</a>
				<a href="<?php echo base_url(); ?>about" class="navbar-brand">| About |</a>
				<a href="<?php echo base_url(); ?>posts" class="navbar-brand">| Blog |</a>
				<a href="<?php echo base_url(); ?>categories" class="navbar-brand">| Categories |</a>
			</div>
			<div class="navbar">
				<?php if(!$this->session->userdata('logged_in')): ?>
					<a href="<?php echo base_url(); ?>users/login">| Log In |</a>
					<a href="<?php echo base_url(); ?>users/register">| Register |</a>
				<?php endif; ?>
				<?php if($this->session->userdata('logged_in')): ?>
					<a href="<?php echo base_url(); ?>posts/create" style="margin-right: 5px;">| Create Post |</a>
					<a href="<?php echo base_url(); ?>categories/create" style="margin-right: 5px;">| Create Category |</a>
					<a href="<?php echo base_url(); ?>users/logout">| Log Out |</a>
				<?php endif; ?>
			</div>
		</div>
		
	</nav>

	<div class="container">
		<!--- Flash Messages -->
		<?php if($this->session->flashdata('user_registered')): ?>
			<?php echo "<p class'alert alert-success'>".$this->session->flashdata('user_registered')."</p>"; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('post_created')): ?>
			<?php echo "<p class'alert alert-success'>".$this->session->flashdata('post_created')."</p>"; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('post_updated')): ?>
			<?php echo "<p class'alert alert-success'>".$this->session->flashdata('post_updated')."</p>"; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('category_created')): ?>
			<?php echo "<p class'alert alert-success'>".$this->session->flashdata('category_created')."</p>"; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('post_deleted')): ?>
			<?php echo "<p class'alert alert-success'>".$this->session->flashdata('post_deleted')."</p>"; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('login_failed')): ?>
			<?php echo "<p class'alert alert-danger'>".$this->session->flashdata('login_failed')."</p>"; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('user_loggedin')): ?>
			<?php echo "<p class'alert alert-success'>".$this->session->flashdata('user_loggedin')."</p>"; ?>
		<?php endif; ?>
		
		<?php if($this->session->flashdata('user_loggedout')): ?>
			<?php echo "<p class'alert alert-success'>".$this->session->flashdata('user_loggedout')."</p>"; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('category_deleted')): ?>
			<?php echo "<p class'alert alert-danger'>".$this->session->flashdata('category_deleted')."</p>"; ?>
		<?php endif; ?>
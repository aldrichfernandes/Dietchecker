<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content= "text/html; charset=utf-8" />
<title>Dietchecker Task Manager</title>
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<head/>
<body>
	<div class= "navbar navbar-inverse navbar-fixed-top">
		<div class= "navbar-inner">
			<div class= "container-fluid">
				<a class= "brand" href="<?php echo base_url();?>">DIETCHECKER</a> <!-- insert the logo here -->
				<div class="nav-collapse collapse">
					<p class="navbar-text pull-right">
						<!--TOP RIGHT CONTENT FOR THE REGISTER BUTTON AND THE WELCOME MESSAGE TO THE USER WHEN THE USER IS LOGGED IN-->

						<?php if ($this->session->userdata('logged_in')) : ?>
						Welcome to Dietchecker, <?php echo $this->session->userdata('username'); ?>
						<?php else : ?>
						<a href="<?php echo base_url(); ?>users/register">REGISTER</a>
					<?php endif; ?>


	</p>
	<ul class="nav">
		<li><a href="<?php echo base_url();?>">Home</a></li>
		<?php if ($this->session->userdata('logged_in')) : ?>
		<li><a href= "<?php echo base_url(); ?>lists">My Lists</a></li>
	<?php endif; ?>

	</ul>
</div>
</div>
</div>
</div>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span3">
			<div class="well sidebar-nav">
				<div style = "margin:0 0 20px 20px;">
          <!-- Sidebar Content -->

					<?php $this->load->view('users/login'); ?>
				</div>
				</div>
				</div>

				<div class="span9">

					<!-- Main Content -->
					<?php $this->load->view($main_content); ?>


					
				</div>
			</div>
			<hr>

			<footer>
				<p>&copy; Copyright 2017</p>
			</footer>
		</div>
</body>
</html>

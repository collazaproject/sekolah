<!DOCTYPE html>
<html>
  <head>
	  <title>MAN Koto Baru Solok</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
    
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/linearicons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nice-select.css">              
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">     
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">      
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
    
    <!-- SCRIPT -->
    <script src="//cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
  </head>
	<body>
   
  <header id="header" id="home">
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>     
          </div>
          <div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
            <a href="tel:+953 012 3654 896"><span class="lnr lnr-phone-handset"></span> <span class="text">(0755) 2334834 </span></a>
            <a href="mailto:support@colorlib.com"><span class="lnr lnr-envelope"></span> <span class="text">fixco.candra@gmail.com</span></a>     
          </div>
        </div>                  
      </div>
    </div>

    <div class="container main-menu">
      <div class="row align-items-center justify-content-between d-flex">
        <div id="logo">
        <a href="index.html"><img src="<?php echo base_url(); ?>/assets/images/web/logo.png" alt="" title="" /></a>
          <!-- <a href="<?php echo base_url(); ?>">MAN Koto Baru Solok</a> -->
        </div>
        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><a href="<?php echo base_url(); ?>profile">Profile</a></li>
            <li><a href="<?php echo base_url(); ?>posts">Blog</a></li>
            <li><a href="<?php echo base_url(); ?>categories">categories</a></li>

            <?php if(!$this->session->userdata('logged_in')) : ?>
              <li><a href="<?php echo base_url(); ?>users/login">Login</a></li>
              <li><a class="nav-link" href="<?php echo base_url(); ?>users/register">Register</a></li>
            <?php endif; ?>

            <?php if($this->session->userdata('logged_in')) : ?>
              <li class="menu-has-children"><a href="">Pages</a>
                <ul>
                  <li><a href="<?php echo base_url(); ?>posts/create">create Post</a></li>   
                  <li><a href="<?php echo base_url(); ?>categories/create">create category</a></li>   
                  <li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>   
                </ul>
              </li>
            <?php endif; ?>
                                                                     
          </ul>
        </nav><!-- #nav-menu-container -->            
      </div>
    </div>
  </header><!-- #header -->

    <!-- Flash message -->
   <?php if($this->session->flashdata('user_registered')): ?>
     <?php echo '<p class="alert alert-success">' .$this->session->flashdata('user_registered'). '</p>' ; ?>
   <?php endif; ?>

   <?php if($this->session->flashdata('post_created')): ?>
     <?php echo '<p class="alert alert-success">' .$this->session->flashdata('post_created'). '</p>' ; ?>
   <?php endif; ?>

   <?php if($this->session->flashdata('post_updated')): ?>
     <?php echo '<p class="alert alert-success">' .$this->session->flashdata('post_updated'). '</p>' ; ?>
   <?php endif; ?>

   <?php if($this->session->flashdata('post_deleted')): ?>
     <?php echo '<p class="alert alert-success">' .$this->session->flashdata('post_deleted'). '</p>' ; ?>
   <?php endif; ?>

   <?php if($this->session->flashdata('category_created')): ?>
     <?php echo '<p class="alert alert-success">' .$this->session->flashdata('category_created'). '</p>' ; ?>
   <?php endif; ?>

   <?php if($this->session->flashdata('user_loggedin')): ?>
     <?php echo '<p class="alert alert-success">' .$this->session->flashdata('user_loggedin'). '</p>' ; ?>
   <?php endif; ?>

   <?php if($this->session->flashdata('user_failed')): ?>
     <?php echo '<p class="alert alert-danger">' .$this->session->flashdata('user_failed'). '</p>' ; ?>
   <?php endif; ?>

   <?php if($this->session->flashdata('user_loggedout')): ?>
     <?php echo '<p class="alert alert-danger">' .$this->session->flashdata('user_loggedout'). '</p>' ; ?>
   <?php endif; ?>

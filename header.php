

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?php wp_title(); ?></title>
  
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"/>
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/css/main.css" />  
  </head>

  <body <?php body_class();?>>

    <header>

      <div class="logo">
      <a href="/" class="name" style="text-decoration: none !important;">JM</a></div>

      <div class="header-menu">
        <a href="/">Home</a>
        <a href="/#services">Services</a>
        <a href="/#portfolio">Portfolio</a>
        <a href="/#blog">Blog</a>
        <a href="/#footer">Contact</a>
      </div>

      <div class="menu-btn">
          <i class="fas fa-bars"></i>
        </div>
    </header> 

   
    <div class="mobile-menu">
        <a href="/">Home</a>
        <a href="/#services">Services</a>
        <a href="/#portfolio">Portfolio</a>
        <a href="/#blog">Blog</a>
        <a href="/#footer">Contact</a>
      </div>
    
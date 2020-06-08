<?php 
/*
Template Name: Single Post Template
*/
get_header();
?>

<section id="portfolio-projects">
      <div class="blog-container">
      <?php if(have_posts()) : while (have_posts(  )) : the_post(  );?>

      <h1><?php the_title( );?></h1>

      <div class="project-image">
          <div class="img" style="background: url('<?php the_post_thumbnail_url( 'medium' ) ?>'); background-size: cover !important;
  background-position: center center !important;
  background-repeat: no-repeat !important;
  background-attachment: fixed !important;"></div>
        </div>

        <div class="content-area">
            <div class="inside-content-area">
                <?php echo the_content(); ?>
            </div>

            <div class="right-widgets">
                <?php get_sidebar('right-sidebar');?>
            </div>
        </div>
        </div>

        <?php endwhile; ?>
          <?php else : ?>
            <div class="">
              <h1>Blogs Somming Soon.</h1>
            </div>
          <?php endif;?>
    </section>


<?php get_footer(); ?>
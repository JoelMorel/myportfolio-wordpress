<?php get_header(); ?>
    <section id="top">
      <div class="container">
        <div class="info">
          <div class="blue-square"></div>

          <h1><?php echo get_bloginfo('name');?></h1>
          <p>
            Web Developer Extraordinaire
          </p>
          <a href="#portfolio">Latest Works</a>
        </div>
        <div class="home-img">
          <div class="background-img"></div>
        </div>
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="title">
          <div class="background-circle"></div>
          <h1>Services</h1>
        </div>
     

        <div class="services-container">

        <?php 
            $mypod = pods('services');
            $mypod->find('name ASC');
        ?>

        <?php while ($mypod->fetch()) : ?>
          <?php
              $name = $mypod->field('name');
              $content = $mypod->field('content');
              $permalink = $mypod->field('permalink');
              $icon_class = $mypod->field('icon_class');
              $border_color = $mypod->field('border_color');
          ?>
                <div class="box <?php echo $border_color; ?>">
                   <i class="<?php echo $icon_class; ?>"></i>  
                    <h5><?php echo $name; ?></h5>
                  <p>
                  <?php echo $content; ?>
                  </p>
                </div>
        <?php endwhile;?>
      </div> 
      </div> 
    </section>

    <section id="portfolio">
      <div class="container">
        <div class="title">
          <div class="background-square"></div>
          <h1>Portfolio</h1>
        </div>

        <div class="portfolio-container">  

        <?php 
            $mypod = pods('project');
            $mypod->find('name ASC');
            $loopIndex = 0;
        ?>

          <?php while ($mypod->fetch()) : ?>
          <?php
            $name = $mypod->field('name');
            $permalink = $mypod->field('permalink');
            $loopIndex += 1;

            $row = $mypod->row();
                $post_id = $row['ID'];
                if (!function_exists('get_post_featured_image')) {
                  function get_post_featured_image($post_id, $size) {
                    $return_array = [];
                    $image_id = get_post_thumbnail_id($post_id);
                    $image = wp_get_attachment_image_src($image_id, $size);
                    $image_url = $image[0];
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                    $image_post = get_post($image_id);
                    $image_caption = $image_post->post_excerpt;
                    $image_description = $image_post->post_content;
                    $return_array['id'] = $image_id;
                    $return_array['url'] = $image_url;
                    $return_array['alt'] = $image_alt;
                    $return_array['caption'] = $image_caption;
                    $return_array['description'] = $image_description;
                    return $return_array;
                  }
                }
                $image_properties = get_post_featured_image($post_id, 'full');
            ?>

            <a href="<?php echo $permalink; ?>" style="background: url(<?php echo $image_properties[url]; ?>);
                background-size: cover;
                background-position: center center;
                background-repeat: no-repeat;
                height: 100%;
                width: 100%;
                text-decoration: none !important;" class="project<?php echo $loopIndex; ?>">
              
              <div class="title">
                  <h3><?php echo $name ?></h3>
              </div>   
             </a>

              <?php endwhile;?>

      </div>
    </section>

    <section id="experience">
      <div class="container">

        <div class="title-container">
          <div class="large-title">
            Experience
          </div>
        </div>
        
        <div class="experience-container">
          <div class="large-icons">
            <div class="square-icon">
              <div class="blue-box">
                Experience
              </div>
            </div>
            <div class="circle-icon">
             <div class="white-box">
               Education
             </div>
            </div>
            <div class="triangle-icon">
              <div class="triangle-box">
                <div class="text">Work</div>
              </div>
            </div>
          </div>

          <div class="info">
          <?php 
            $mypod = pods('experience');
            $mypod->find('date_range DESC');
          ?>

          <?php while ($mypod->fetch()) : ?>
          <?php
            $name = $mypod->field('name');
            $content = $mypod->field('content');
            $date_range = $mypod->field('date_range');
            $location = $mypod->field('location');
            $permalink = $mypod->field('permalink');
          ?>

          <div class="info-box">
             <h4><?php echo $name ?> - <?php echo $location ?> </h4>
             <span class="date"> <?php echo $date_range ?></span>
             <p><?php echo $content ?></p>
           </div>
          <?php endwhile;?>

    </section>

    <section id="blog">
      <div class="container">
        <div class="title">
          <h1>Blog</h1>
        </div>

        <div class="blog-container">

          <?php if(have_posts()) : while (have_posts(  )) : the_post(  );?>
          
          <a href="<?php the_permalink(  );?>" class="post post-<?php the_ID(); ?>">
            <div class="post-image" style="background: url('<?php the_post_thumbnail_url( 'medium' ) ?>
              '); "></div>
            <div class="post-details">
              <h4><?php the_title( );?></h4>
              <p><?php the_excerpt(); ?></p>
            </div>
            <div class="more">
                <div class="button">
                  READ MORE.
                </div>
            </div>
          </a>
          <?php endwhile; ?>
          
          <?php else : ?>
            <div>
              <h1>Blogs Comming Soon.</h1>
            </div>
          <?php endif;?>
          </div>
          
        </div>
    </section>

<?php get_footer(); ?>
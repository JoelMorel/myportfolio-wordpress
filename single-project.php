<?php 
/*
Template Name: Single Project Template
*/


get_header();
?>

<?php
// get the current slug
$slug = pods_v('last', 'url');

// get the pods object
$mypod = pods('project', $slug);

// set our variables
$name = $mypod->field('name');
$project_URL = $mypod->field('project_url');
$sourceCode_URL = $mypod->field('source_code_url');
$project_description = $mypod->field('content');
$technology_icon = $mypod->field('technology_icon');
$technology_icon_2 = $mypod->field('technology_icon_2');
$technology_icon_3 = $mypod->field('technology_icon_3');
$technology_icon_4 = $mypod->field('technology_icon_4');
$video_URL = $mypod->field('video_walkthrough');

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

<section id="portfolio-projects">
      <div class="container">
      <div class="project-image">
          <div class="img" style="background: url('<?php echo $image_properties[url]; ?>');"></div>
        </div>

        <h1><?php echo $name; ?></h1>

        <div class="info">
          <div class="buttons">
            <a href="<?php echo $project_URL; ?>"
              ><i class="fas fa-desktop"></i>View Project</a
            >
            <a href="<?php echo $sourceCode_URL; ?>"><i class="fab fa-github"></i>View Source</a>
          </div>
        </div>

        <?php echo $project_description; ?>

        <div class="technologies">
          <h3>Technologies</h3>

          <div class="icons">
            <img src="<?php echo $technology_icon; ?>">
            <img src="<?php echo $technology_icon_2; ?>">
            <img src="<?php echo $technology_icon_3; ?>">
            <img src="<?php echo $technology_icon_4; ?>">
          </div>
        </div>

        <div class="project-video">
          <h3>VIDEO WALKTHROUGH</h3>
          <iframe width="560" height="315" src="<?php echo $video_URL ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </section>


<php get_footer(); ?>
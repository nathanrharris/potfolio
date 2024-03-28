<?php
/*
 *  Template Name: Hire
 */
?>
<?php get_header(); ?>
<div id="contact-me-form" class="col-xs-12 col-sm-6">
  <div class="hire-page-bg">
    <h3>Contact Me:</h3>
    <?php
      $the_query = new WP_Query( array( 'page_id' => 61 ) );

      while ($the_query->have_posts()) {
        $the_query->the_post();
        the_content();
      }
    ?>
  </div>
</div>
<div id="quote-form" class="col-xs-12 col-sm-6">
  <div class="hire-page-bg">
    <h3>Request a Quote:</h3>
    <?php
      $the_query = new WP_Query( array( 'page_id' => 68 ) );

      while ($the_query->have_posts()) {
        $the_query->the_post();
        the_content();
      }
    ?>
  </div>
</div>

<br clear="both" />

<h4 class="interior-page-view"><a href="/"><img src="<?php print get_template_directory_uri(); ?>/images/portfolio-a
rrow-left.png" /> Return Home</a></h4>

<?php get_footer(); ?>

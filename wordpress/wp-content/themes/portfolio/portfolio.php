<?php
/*
 *  Template Name: Portfolio
 */
?>

<?php get_header(); ?>

<div class="clear"></div>

<?php
  
  $f = NULL;

  if (isset($_COOKIE['filter'])) {
    $f = $_COOKIE['filter']; 
  }
?>

<div class="row">
  <form id="form-filter" class="portfolio-filter visible-xs">
    <select id="portfolio-form-filter-select">
      <option value="all"           <?php if ($f == 'all') {          print 'selected="selected"'; } ?>>All</option>
      <option value="drupal"        <?php if ($f == 'drupal') {       print 'selected="selected"'; } ?>>Drupal</option>
      <option value="wordpress"     <?php if ($f == 'wordpress') {    print 'selected="selected"'; } ?>>Wordpress</option>
      <option value="php"           <?php if ($f == 'php') {          print 'selected="selected"'; } ?>>PHP</option>
      <option value="ecommerce"     <?php if ($f == 'ecommerce') {    print 'selected="selected"'; } ?>>Ecommerce</option>
      <option value="multilingual"  <?php if ($f == 'multilingual') { print 'selected="selected"'; } ?>>Multilingual</option>
      <option value="theming"       <?php if ($f == 'theming') {      print 'selected="selected"'; } ?>>Theming</option>
      <option value="sasscompass"   <?php if ($f == 'sasscompass') {  print 'selected="selected"'; } ?>>Sass</option>
      <option value="bootstrap"     <?php if ($f == 'bootstrap') {    print 'selected="selected"'; } ?>>Bootstrap</option>
    </select>
  </form>

  <ul id="filter" class="portfolio-filter hidden-xs">
    <li><a href="#" class="grid-filter <?php if ($f == 'all') { print 'active'; } ?>" id="all">All</a></li>
    <?php
      $categories = get_terms(array('taxonomy' => 'technology', 'hide_empty' => FALSE));
      foreach ($categories as $c) :
    ?>
      <li><a href="#" class="grid-filter <?php if ($f == $c->slug) { print 'active'; } ?>" id="<?php print $c->slug; ?>"><?php print str_replace(' Development', '', $c->name); ?></a></li>
    <?php endforeach; ?>
  </ul>
</div>

<div id="portfolio-grid">

<?php
  $args = array('post_type' => 'project', 'posts_per_page' => -1);
  $the_query = new WP_Query($args);

  $count = 0;

  while ($the_query->have_posts()) :
    $the_query->the_post();
    $count += 1;
    $border_count = (($count % 4) + 1);

    $background_size = 'small';
    $thumb = 'thumb_small';

    $featured = get_field('featured');

    if ($featured == TRUE) {
      $background_size = 'large';

      $thumb = 'full';
    }

    $screenshot   = get_field('screenshot_1');

    $tech   = get_the_terms(get_the_ID(), 'technology');

    $tech_classes = '';

    foreach ($tech as $t) {
      $tech_classes .= $t->slug . ' ';
    }
?>

  <a href="<?php print str_replace('http://www.nathanrharris.com', '', get_the_permalink()); ?>">
    <img  style="background-image: url(<?php print $screenshot['sizes']['portfolio_' . $thumb]; ?>);"
          src="<?php print get_template_directory_uri(); ?>/images/border-<?php print $border_count; ?>.png"
          class="portfolio-screenshot-<?php print $background_size; ?> grid-item <?php print $tech_classes; ?>" />
  </a>

<?php
  endwhile;
?>

</div>

<br clear="both" />

<h4 class="interior-page-view"><a href="/"><img src="<?php print get_template_directory_uri(); ?>/images/portfolio-arrow-left.png" /> Return Home</a></h4>

<?php get_footer(); ?>

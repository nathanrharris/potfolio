<?php get_header(); ?>

<div id="project-id" data-id="<?php print get_the_ID(); ?>" style="display:none;"></div>

<?php

$ids = array();

if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();

    $id = get_the_ID();

    $screenshot   = get_field('screenshot_1');
    $screenshot_2 = get_field('screenshot_2');
    $screenshot_3 = get_field('screenshot_3');

    $url = get_field('url');

    $client               = get_the_terms(get_the_ID(), 'client');
    $team                 = get_the_terms(get_the_ID(), 'team');
    $project_description  = get_the_terms(get_the_ID(), 'project_description');
    $tasks                = get_the_terms(get_the_ID(), 'task');
    $tech                 = get_the_terms(get_the_ID(), 'technology');

    $ids['all'][] = $id;

    foreach ($tech as $t) {
      $ids[$t->slug][] = $id;
    }

    $color1 = get_field('color_1');
    $color2 = get_field('color_2');
    $color3 = get_field('color_3');

  } // end while
} // end if
?>

<div class="clear"></div>

<?php 

  $f = '';

  if (isset($_COOKIE['filter'])) {
    $f = $_COOKIE['filter']; 
  }

?>

<?php // Find first project for each type

  $projects = array();

  $projects['all'] = get_posts(array('numberposts' => 1, 'post_type' => 'project'));

  $categories = get_terms(array('taxonomy' => 'technology', 'hide_empty' => FALSE));

  foreach ($categories as $c) {
    $projects[$c->slug] = get_posts(array('numberposts' => 1, 'post_type' => 'project', 'tax_query' => array(array('taxonomy' => 'technology', 'field' => 'id', 'terms' => $c->term_id))));

    if ($f == $c->slug) {

      $prev_next_projects = get_posts(array('numberposts' => -1, 'post_type' => 'project', 'tax_query' => array(array('taxonomy' => 'technology', 'field' => 'id', 'terms' => $c->term_id))));

      $found = FALSE;

      foreach ($prev_next_projects as $pnp) {

        if ($pnp->ID == $id) {
          $found = TRUE;
        }
        else if (($found == TRUE) && (!isset($projects['next']))) {
          $projects['next'] = $pnp;
        }
        else if ($found == FALSE) {
          $projects['prev'] = $pnp;
        }
      }
    }
  }

  if ($f == 'all') {
    $prev_next_projects = get_posts(array('numberposts' => -1, 'post_type' => 'project'));

    $found = FALSE;

    foreach ($prev_next_projects as $pnp) {

      if ($pnp->ID == $id) {
        $found = TRUE;
      }
      else if (($found == TRUE) && (!isset($projects['next']))) {
        $projects['next'] = $pnp;
      }
      else if ($found == FALSE) {
        $projects['prev'] = $pnp;
      }
    }
  }
?>

<div class="row">
  <form id="form-filter" class="project-filter visible-xs">
    <select id="project-form-filter-select" onchange="window.location=jQuery(this).val();">
      <option value="<?php print get_permalink($projects['all'][0]->ID); ?>"           <?php if ($f == 'all') {          print 'selected="selected"'; } ?>>All</option>
      <?php
        foreach ($categories as $c) :
      ?>
        <option value="<?php print get_permalink($projects[$c->slug][0]->ID); ?>"     <?php if ($f == $c->slug) {    print 'selected="selected"'; } ?>><?php print str_replace(' Development', '', $c->name); ?></option>
      <?php
        endforeach;
      ?>
    </select>
  </form>

  <div id="portfolio-mobile-nav" class="visible-xs">
    <?php if (isset($projects['prev'])) : ?>
      <a href="<?php print get_permalink($projects['prev']->ID); ?>" id="project-prev"><img src="<?php print get_template_directory_uri(); ?>/images/portfolio-arrow-left.png" /></a>
    <?php endif; ?>
    <?php if (isset($projects['prev']) && isset($projects['next'])) : ?>
      |
    <?php endif; ?>
    <?php if (isset($projects['next'])) : ?>
      <a href="<?php print get_permalink($projects['next']->ID); ?>" id="project-next"><img src="<?php print get_template_directory_uri(); ?>/images/portfolio-arrow-right.png" /></a>
    <?php endif; ?>
  </div>

  <ul id="filter" class="portfolio-filter hidden-xs">
    <li><a href="<?php if ($f != 'all') { print get_permalink($projects['all'][0]->ID); } else { print '#" onclick="return false;"';  } ?>" class="grid-filter <?php if ($f == 'all') { print 'active'; } ?>" id="all">All</a></li>
    <?php
      foreach ($categories as $c) :
    ?>
      <?php if ($f == $c->slug) : ?>
        <li><a href="#" onclick="return false;" class="grid-filter active" id="<?php print $c->slug; ?>"><?php print str_replace(' Development', '', $c->name); ?></a></li>
      <?php else : ?>
        <li><a href="<?php print get_permalink($projects[$c->slug][0]->ID); ?>" class="grid-filter" id="<?php print $c->slug; ?>"><?php print str_replace(' Development', '', $c->name); ?></a></li>
      <?php endif; ?>
    <?php endforeach; ?>
  </ul>
</div>

<div id="project-wrapper">
  <div class="row">

      <div class="col-sm-1 arrow hidden-xs">
        <?php if (isset($projects['prev'])) : ?>
        <a href="<?php print get_permalink($projects['prev']->ID); ?>" id="project-prev-slide" style="color: <?php print $color1; ?>;"><img src="<?php print get_template_directory_uri(); ?>/images/portfolio-arrow-left.png" /></a>
        <?php endif; ?>
      </div>

    <div class="col-xs-12 col-sm-7 project-screenshot-large">
      <div class="screenshot-title">
        <?php $short_title = get_field('short_title'); ?>
        <?php if ($short_title) : ?>
          <h3   class="visible-xs screenshot-header"
                style=" -webkit-text-stroke: <?php print $color1; ?> 2px;
                        background-image: -webkit-linear-gradient(<?php print $color2; ?>, <?php print $color2; ?>, <?php print $color3; ?>, <?php print $color3; ?>);
                        <?php if (strlen(get_the_title()) > 16) : ?>background-image: -webkit-linear-gradient(<?php print $color2; ?>, <?php print $color2; ?>, <?php print $color3; ?>);<?php endif; ?> "
                data-text="<?php print strtoupper($short_title); ?>">
                <?php print strtoupper($short_title); ?>
          </h3>
          <h3   class="hidden-xs screenshot-header <?php if (strlen(get_the_title()) > 20) { print " long "; } ?>"
                style=" -webkit-text-stroke: <?php print $color1; ?> 2px;
                        background-image: -webkit-linear-gradient(<?php print $color2; ?>, <?php print $color2; ?>, <?php print $color3; ?>, <?php print $color3; ?>);
                        <?php if (strlen(get_the_title()) > 16) : ?>background-image: -webkit-linear-gradient(<?php print $color2; ?>, <?php print $color2; ?>, <?php print $color3; ?>);<?php endif; ?> "
                data-text="<?php print strtoupper(get_the_title()); ?>">
                <?php print strtoupper(get_the_title()); ?>
          </h3>
        <?php else : ?>
          <h3   class="screenshot-header <?php if (strlen(get_the_title()) > 20) { print " long "; } ?>"
                style=" -webkit-text-stroke: <?php print $color1; ?> 2px;
                         <?php if (strlen(get_the_title()) > 20) { print " font-size: 50px; "; } ?>
                        background-image: -webkit-linear-gradient(<?php print $color2; ?>, <?php print $color2; ?>, <?php print $color3; ?>, <?php print $color3; ?>);
                        <?php if (strlen(get_the_title()) > 16) : ?>background-image: -webkit-linear-gradient(<?php print $color2; ?>, <?php print $color2; ?>, <?php print $color3; ?>);<?php endif; ?> "
                data-text="<?php print strtoupper(get_the_title()); ?>">
                <?php print strtoupper(get_the_title()); ?>
          </h3>

        <?php endif; ?>
      </div>

      <img style="background-image: url(<?php print $screenshot['sizes']['portfolio_full']; ?>);" src="<?php print get_template_directory_uri(); ?>/images/border-1.png" class="screenshot" />

      <?php if (isset($url) && $url != '') : ?>
      <div class="screenshot-url"><a href="http://<?php print $url; ?>" target="_blank"><?php print $url; ?></a></div>
      <?php endif; ?>

    </div>

    <div class="col-sm-3 hidden-xs project-screenshot-small">
      <?php if (isset($screenshot_2['sizes'])) : ?>
      <img style="background-image: url(<?php print $screenshot_2['sizes']['portfolio_thumb_small']; ?>);" src="<?php print get_template_directory_uri(); ?>/images/border-2.png" class="project-screenshot project-screenshot-1" />
      <?php endif; ?>
      <?php if (isset($screenshot_3['sizes'])) : ?>
      <br /><br />
      <img style="background-image: url(<?php print $screenshot_3['sizes']['portfolio_thumb_small']; ?>);" src="<?php print get_template_directory_uri(); ?>/images/border-3.png" class="project-screenshot project-screenshot-2" />
      <?php endif; ?>
    </div>

      <div class="col-sm-1 arrow hidden-xs">
        <?php if (isset($projects['next'])) : ?>
          <a href="<?php print str_replace('http://www.nathanrharris.com','',get_permalink($projects['next']->ID)); ?>" id="project-next-slide"  style="color: <?php print $color1; ?>;"><img src="<?php print get_template_directory_uri(); ?>/images/portfolio-arrow-right.png" /></a>
        <?php endif; ?>
      </div>

  </div>

  <div class="col-xs-12 col-sm-5 col-sm-offset-1 role details">
    <h4>My Role</h4>
    <p>
      <?php
          if (get_field('contractor_/_employer') == 1) {
            $contractor = 'employee';
          }
          else {
            $contractor = 'contractor';
          }

          if (get_field('direct') == 1) {
            print "On this project, I worked directly for {$client[0]->name}.";
          } else {
            print "On this project, I worked as a $contractor for {$client[0]->name}.";
          }
      ?>

      <?php
          if (isset($team[0])) {
            print "{$team[0]->name} ";
          }
      ?>

      <?php
          if (isset($project_description[0])) {
              print " {$project_description[0]->name} ";
          }
      ?>
    </p>

  </div>
  <div class="col-xs-12 col-sm-3 tasks details">
    <h4>Tasks</h4>
    <ul>
      <?php foreach ($tasks as $k => $t) : ?>
        <li><?php print $t->name; ?></li>
      <?php endforeach; ?>
    </ul>
  </div>

  <div class="col-xs-12  col-sm-2 tech details">
    <h4>Project Type</h4>
    <ul>
      <?php foreach ($tech as $t) : ?>
        <li><?php print $t->name; ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>

<br clear="both" />

<h4 class="interior-page-view"><a href="/portfolio"><img src="<?php print get_template_directory_uri(); ?>/images/portfolio-arrow-left.png" /> Portfolio</a></h4>

<?php get_footer(); ?>

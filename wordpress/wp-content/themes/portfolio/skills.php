<?php
/*
 *  Template Name: Skills
 */
?>

<?php get_header(); ?>

<?php $terms = get_terms('skill_group', array('orderby' => 'term_order'));  ?>

<div class="clear"></div>

<div class="row">
  <form id="form-filter" class="skill-filter visible-xs">
    <select id="form-filter-select">
      <?php foreach ($terms as $t) : ?>
        <option value="<?php print $t->slug; ?>"><?php print $t->name; ?></option>
      <?php endforeach; ?>
    </select>
  </form>
  <ul id="filter" class="skill-filter hidden-xs">
    <?php foreach ($terms as $t) : ?>
      <li><a href="#" class="skill-filter" id="<?php print $t->slug; ?>"><?php print $t->name; ?></a></li>
    <?php endforeach; ?>
  </li>
</div>

  <?php foreach ($terms as $k => $t) : ?>
  <div class="skill-<?php print $k; ?> <?php if (in_array($k, array(0, 1))) : ?>col-sm-6 group-1<?php elseif (in_array($k, array(2, 3, 4))): ?>col-sm-6 col-md-4<?php else: ?>col-sm-6 col-md-4<?php endif; ?> skill" id="pane-<?php print $t->slug; ?>">
    <h3><?php print $t->name; ?></h3>
    <ul>
      <?php
        $args = array(  'post_type' => 'skill',
                        'tax_query' => array(array(  'taxonomy' => 'skill_group',
                                              'field' => 'slug',
                                              'terms' => $t->slug)));
        $the_query = new WP_Query($args);

        while ($the_query->have_posts()) :
          $the_query->the_post();

          $img = get_field('icon');

          $details = get_field('skill_details');
      ?>

      <li>
        <h4><img class="skill-icon" src="<?php print $img['url']; ?>" /><?php the_title(); ?></h4>
        <span class="skill-description"><?php the_content(); ?></span>
      </li>
    <?php endwhile; ?>
    </ul>
  </div>
<?php endforeach; ?>

<br clear="both" />

<h4 class="interior-page-view"><a href="/"><img src="<?php print get_template_directory_uri(); ?>/images/portfolio-a
rrow-left.png" /> Return Home</a></h4>

<?php get_footer(); ?>

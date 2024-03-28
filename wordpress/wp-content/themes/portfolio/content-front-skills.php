<div class="container">
  <?php $terms = get_terms('skill_group', array('orderby' => 'term_order'));  ?>

  <div class="row front-skills-row">
    <?php foreach ($terms as $k => $t) : ?>
    <?php if ($k >= 6) { continue; } ?>
    <div class="col-sm-4">
      <div class="front-skill">
        <h3><?php print $t->name; ?></h3>
        <ul>
        <?php
          $args = array(  'post_type' => 'skill',
                          'tax_query' => array(array(  'taxonomy' => 'skill_group',
                                                'field' => 'slug',
                                                'terms' => $t->slug)),
                          'posts_per_page' => 5);

          $the_query = new WP_Query($args);

          while ($the_query->have_posts()) :
            $the_query->the_post();

            $img = get_field('icon');

        ?>

          <li><img src="<?php print $img['url']; ?>" /><?php the_title(); ?></li>
        <?php endwhile; ?>
        </ul>
      </div>
    </div>
    <?php if ($k == 2) : ?>
      </div><div class="row front-skills-row">
    <?php endif; ?>
  <?php endforeach; ?>
  </div>
</div>


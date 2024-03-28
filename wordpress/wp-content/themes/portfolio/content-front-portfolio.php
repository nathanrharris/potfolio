<div id="portfolio-slider-wrapper" class="container">
  <?php
    $args = array('post_type' => 'project', 'posts_per_page' => -1, 'meta_key' => 'featured', 'meta_value' => 1);
    $the_query = new WP_Query($args);

    $count = 0;

    while ($the_query->have_posts()) :
      $the_query->the_post();
      $count += 1;

      $border_count = (($count % 4) + 1);

      $screenshot   = get_field('screenshot_1');
      $screenshot_2 = get_field('screenshot_2');

      $url = get_field('url');

      $client               = get_the_terms(get_the_ID(), 'client');
      $team                 = get_the_terms(get_the_ID(), 'team');
      $project_description  = get_the_terms(get_the_ID(), 'project_description');
      $tasks                = get_the_terms(get_the_ID(), 'task');
      $tech                 = get_the_terms(get_the_ID(), 'technology');

      $color1 = get_field('color_1');
      $color2 = get_field('color_2');
      $color3 = get_field('color_3');

      $two_images = get_field('featured_two_images');

  ?>

  <div id="portfolio-item-<?php print $count; ?>" class="portfolio-item row">
    <div class="col-sm-1 arrow left-arrow"><a href="#" onclick="prev_slide()" style="color: <?php print $color1; ?>;"><img src="<?php print get_template_directory_uri(); ?>/images/portfolio-arrow-left.png" /></a></div>
    <div class="col-sm-5 col-md-6">
      <div class="screenshot-title">
        <h3   class="screenshot-header"
              style=" -webkit-text-stroke: <?php print $color1; ?> 2px;
                      <?php if (strlen(get_the_title()) > 18) { print " font-size: 50px; "; } ?>
                      background-image: -webkit-linear-gradient(<?php print $color2; ?>, <?php print $color2; ?>, <?php print $color3; ?>, <?php print $color3; ?>);"
              data-text="<?php print strtoupper(get_the_title()); ?>"><?php print strtoupper(get_the_title()); ?></h3>
      </div>

      <?php if ($two_images == 1) : ?>
        <img style="background-image: url(<?php print $screenshot['sizes']['large']; ?>);" src="<?php print get_template_directory_uri(); ?>/images/border-<?php print $border_count; ?>.png" class="screenshot_two" />
        <img style="background-image: url(<?php print $screenshot_2['sizes']['large']; ?>);" src="<?php print get_template_directory_uri(); ?>/images/border-<?php print $border_count; ?>.png" class="screenshot_two_second" />
      <?php else : ?>
        <img style="background-image: url(<?php print $screenshot['sizes']['portfolio_full']; ?>);" src="<?php print get_template_directory_uri(); ?>/images/border-<?php print $border_count; ?>.png" class="screenshot" />
      <?php endif; ?>

      <?php if (isset($url) && $url != '') : ?>
      <div class="screenshot-url"><a href="http://<?php print $url; ?>" target="_blank"><?php print $url; ?></a></div>
      <?php endif; ?>
    </div>
    <div class="col-sm-5 col-md-4 portfolio-details" >
      <div class="portfolio-details-item role">
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
      <div class="portfolio-details-item tasks">
        <h4>Tasks</h4>
        <ul>
          <?php foreach ($tasks as $k => $t) : ?>
            <?php if ($k < 4) : ?> <li><?php print $t->name; ?></li><?php endif; ?>
            <?php if ($k == 4) : ?> <li>More in portfolio...</li><?php endif; ?>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="portfolio-details-item tech">
        <h4>Project Type</h4>
        <ul>
          <?php foreach ($tech as $t) : ?>
            <li><?php print $t->name; ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="col-sm-1 arrow right-arrow"><a href="#" onclick="next_slide()" style="color: <?php print $color1; ?>;"><img src="<?php print get_template_directory_uri(); ?>/images/portfolio-arrow-right.png" /></a></div>
  </div>

  <?php endwhile; ?>
</div>

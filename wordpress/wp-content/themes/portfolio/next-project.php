<?php
/*
 *  Template Name: Project Next
 */

$id_in  = $_POST['current_project'];
$cat = $_POST['project_category'];

$current_post = get_post($id_in);

$current_categories = get_the_terms($id_in, 'technology');

$current_category = FALSE;

if ($cat == 'all') {
  $current_category = TRUE;
}

foreach ($current_categories as $c) {
  if ($c->slug == $cat) {
    $current_category = TRUE;
  }
}

if ($current_category) {
  $next = FALSE;
  $first = null;
  $print_first = TRUE;

  if ($cat == 'all') {
    $args = array(  'post_type' => 'project',
                    'posts_per_page' => 999,
            );
  } else {
    $args = array(  'post_type' => 'project',
                    'posts_per_page' => 999,
                    'tax_query' =>  array(
                                      array(
                                        'taxonomy' => 'technology',
                                        'field' => 'slug',
                                        'terms' => $cat
                                      ),
                                    ),
            );
  }

  $the_query = new WP_Query($args);

  while ( $the_query->have_posts() ) {
    $the_query->the_post();

    if (!isset($first)) {
      $first = get_the_permalink();
    }

    if ($next == TRUE) {
      $next = FALSE;
      $print_first = FALSE;

      print get_the_permalink();
    }

    if (get_the_id() == $id_in) {
      $next = TRUE;
    }
  }

  if ($print_first) {
    print $first;
  }

} else {
  $args = array(  'post_type' => 'project',
                  'tax_query' =>  array(
                                    array(
                                      'taxonomy' => 'technology',
                                      'field' => 'slug',
                                      'terms' => $cat
                                    ),
                                  ),
                  'posts_per_page' => 1,
          );

  $the_query = new WP_Query($args);

  while ( $the_query->have_posts() ) {
    $the_query->the_post();
    print the_permalink();
  }
}



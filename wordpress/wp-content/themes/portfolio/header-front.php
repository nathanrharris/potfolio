<!DOCTYPE html>
  <head>
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

    <meta property="og:image" content="http://www.nathanrharris.com/screenshot.png">
    <meta property="og:description" content="Nathan Harris is a freelance Web Developer, based in Pittsburgh, that specializes in building Drupal and Wordpress applications. This is his portfolio.">
  </head>
  <body  <?php body_class(); ?>>
    <div id="mobile-menu" class="visible-xs">
      <a href="/">Home</a>
      <a href="/portfolio">Work</a>
      <a href="/skills">Skills</a>
      <a href="/hire">Hire</a>
    </div>

<!DOCTYPE html>
  <head>
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

    <meta property="og:image" content="http://www.nathanrharris.com/screenshot.png">
    <meta property="og:description" content="Welcome to the online resume for Nathan Harris.">

    <link rel="icon" type="image/png" sizes="32x32" href="/wp-content/themes/portfolio/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/wp-content/themes/portfolio/images/favicon-16x16.png">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-L0BD44NKNT"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-L0BD44NKNT');
    </script>

  </head>
  <body  <?php body_class(); ?>>
    <div id="mobile-menu" class="visible-xs">
      <a href="/">Home</a>
      <a href="/portfolio">Work</a>
      <a href="/skills">Skills</a>
      <a href="/hire">Hire</a>
    </div>

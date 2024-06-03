<div class="container home-about-container">
  <div class="row">
    <div class="col-xs-12 col-md-8">
      <div class="home-about-wrapper">
        <?php
          $post = get_post(13);
          print $post->post_content;
        ?>
      </div>
    </div>

    <div class="col-xs-12 col-md-4">
      <div id="resumes">
        <h4>Resume</h4>
        <a href="/Nathan-Harris-Resume.pdf"><img src="<?php print get_template_directory_uri(); ?>/images/resume-bg.png" /><br />Dev</a>
        <a href="/Nathan-Harris-Drupal-Resume.pdf"><img src="<?php print get_template_directory_uri(); ?>/images/drupal-resume-bg.png" /><br />Drupal</a>
        <a href="/Nathan-Harris-Wordpress-Resume.pdf"><img src="<?php print get_template_directory_uri(); ?>/images/wordpress-resume-bg.png" /><br />WordPress</a>
      </div>

      <div id="social-networking">
        <h4>Connect</h4>
        <a href="https://www.facebook.com/nathan.harris.585112" target="_blank"><img src="<?php print get_template_directory_uri(); ?>/images/facebook-round.png" /></a>
        <a href="https://www.linkedin.com/in/nathanrharris" target="_blank"><img src="<?php print get_template_directory_uri(); ?>/images/linkedin-round.png" /></a>
        <a href="https://www.twitter.com/nathanrharris" target="_blank"><img src="<?php print get_template_directory_uri(); ?>/images/twitter-round.png" /></a>
        <a href="https://www.instagram.com/nathanrharris" target="_blank"><img src="<?php print get_template_directory_uri(); ?>/images/instagram-round.png" /></a>
        <!--
        <a href=""><img src="<?php print get_template_directory_uri(); ?>/images/sn-drupal.png" /></a>
        <a href=""><img src="<?php print get_template_directory_uri(); ?>/images/sn-wordpress.png" /></a>
        -->
      </div>
    </div>
  </div>
</div>

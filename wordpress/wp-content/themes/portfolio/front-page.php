<?php get_header('front'); ?>
  <div id="wrapper">
    <div id="pane-home" class="pane">
      <div class="pane-wrapper" id="home-wrapper" data-panel="home">
        <div id="pane-home-content" class="pane-content">
          <?php get_template_part('content', 'front-about'); ?>
        </div>
      </div>
      <video id="home-video" autoplay loop muted>
        <source src="https://s3.us-east-2.amazonaws.com/nathanrharris/screen-saver-foo.mp4">
        <?php /* ?>
        <source src="<?php print get_template_directory_uri(); ?>/videos/me-working.webmsd.webm">
        <?php */ ?>
      </video>
    </div>
    <div id="pane-portfolio" class="pane hidden-xs">
      <div class="pane-code-3"> <div class="pane-code-2"> <div class="pane-code-1"> </div> </div> </div>
      <div class="pane-wrapper" id="portfolio-wrapper" data-panel="portfolio">
        <div id="pane-portfolio-content" class="pane-content">
          <div id="pane-portfolio-overlay" class="pane-overlay">
            <?php get_template_part('content', 'front-portfolio'); ?>
            <h4 class="front-page-view"><a href="/portfolio">More Projects <img src="<?php print get_template_directory_uri(); ?>/images/portfolio-arrow-right.png" /></a></h4>
          </div>
        </div>
      </div>
    </div>
    <div id="pane-skills" class="pane hidden-xs">
      <div class="pane-code-3"> <div class="pane-code-2"> <div class="pane-code-1"> </div> </div> </div>
      <div class="pane-wrapper" id="skills-wrapper" data-panel="skills">
        <div id="pane-skills-content" class="pane-content">
          <div id="pane-skills-overlay" class="pane-overlay">
            <?php get_template_part('content', 'front-skills'); ?>
            <h4 class="front-page-view"><a href="/skills">More Skills <img src="<?php print get_template_directory_uri(); ?>/images/portfolio-arrow-right.png" /></a></h4>
          </div>
        </div>
      </div>
    </div>
    <div id="pane-hire" class="pane hidden-xs">
      <div class="pane-code-3"> <div class="pane-code-2"> <div class="pane-code-1"> </div> </div> </div>
      <div class="pane-wrapper" id="hire-wrapper" data-panel="hire">
        <div id="pane-hire-content" class="pane-content">
          <div id="pane-hire-overlay" class="pane-overlay">
            <?php get_template_part('content', 'front-contact'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php get_footer('front'); ?>

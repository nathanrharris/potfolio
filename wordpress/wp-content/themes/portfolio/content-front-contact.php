<div class="container">
  <div class="col-xs-12 col-sm-6">
    <div class="pane-hire-bg">
      <h3>Contact Me:</h3>
      <?php
        $the_query = new WP_Query( array( 'page_id' => 61 ) );

        while ($the_query->have_posts()) {
          $the_query->the_post();
          the_content();
        }
      ?>
    </div>
  </div>
  <div class="col-xs-12 col-sm-6">
    <div class="pane-hire-bg">
      <h3>Request a Quote:</h3>
      <?php
        $the_query = new WP_Query( array( 'page_id' => 68 ) );

        while ($the_query->have_posts()) {
          $the_query->the_post();
          the_content();
        }
      ?>
    </div>
  </div>
</div>


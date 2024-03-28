var $j = jQuery.noConflict();

var audio_swoosh = new Audio('/wp-content/themes/portfolio/sounds/220191__gameaudio__space-swoosh-brighter.wav');
var audio_hit = new Audio('/wp-content/themes/portfolio/sounds/50221__tblo__high-hit.wav');
var audio_slide = new Audio('/wp-content/themes/portfolio/sounds/171321__swidmark__fast-swoosh.wav');

/************************/
/*   HOME PAGE          */
/************************/

$j(document).ready(function() {

  var pos = $j(window).scrollTop();
  var h = $j(window).height();

  $j('body').mousedown(function() {
    if ($j('video source').attr('src') != 'https://s3.us-east-2.amazonaws.com/nathanrharris/nathan-working-2.mp4') {
      $j('video source').attr('src', 'https://s3.us-east-2.amazonaws.com/nathanrharris/nathan-working-2.mp4');
      $j('video')[0].load();
    }
  });

  if ($j('body').hasClass('home')) {
    var vh = $j(window).height() - $j('#pane-home-content').height() - $j('#pane-home-content').css('padding-top').replace('px','');
    var w = $j(window).width();

    // Resize video
    function resize_video() {
      if ((w/vh) > (2560/1440)) {
        $j('video').css('width', '100%');
        $j('video').css('height', 'auto');
        $j('video').css('margin-left', '0');

        var vmt = ($j('video').height() - ($j(window).height() - $j('#pane-home-content').height())) / -2;

        if (vmt < 0) {
          $j('video').css('margin-top', vmt);
        }

      } else {
        $j('video').css('width', 'auto');
        $j('video').css('height', vh);
        $j('video').css('margin-left', (-($j('video').width() - w)/2));
        $j('video').css('margin-top', '0');
      }
    }

    setTimeout(function() { resize_video(); }, 250);
    setTimeout(function() { resize_video(); }, 500);
    setTimeout(function() { resize_video(); }, 750);
    setTimeout(function() { resize_video(); }, 1000);
    setTimeout(function() { resize_video(); }, 1500);

    $j(window).resize(function () {
      vh = $j(window).height() - $j('#pane-home-content').height() - $j('#pane-home-content').css('padding-top').replace('px','');
      w = $j(window).width();

      if ((w/vh) > (2560/1440)) {
        $j('video').css('width', '100%');
        $j('video').css('height', 'auto');
        $j('video').css('margin-left', '0');

        var vmt = ($j('video').height() - ($j(window).height() - $j('#pane-home-content').height())) / -2;

        if (vmt < 0) {
          $j('video').css('margin-top', vmt);
        }

      } else {
        $j('video').css('width', 'auto');
        $j('video').css('height', vh);
        $j('video').css('margin-left', (-($j('video').width() - w)/2));
        $j('video').css('margin-top', '0');
      }
    });
  }

  if (pos > (h * .9)) {
    $j('#icons').addClass('icon-adjust');
  } else {
    $j('#icons').removeClass('icon-adjust');
    $j('.title, .icon').fadeIn(200);
  }

  $j('#icons #icon-1').click(function() {  $j.scrollify.move(0); });
  $j('#icons #icon-2').click(function() {  $j.scrollify.move(1); });
  $j('#icons #icon-3').click(function() {  $j.scrollify.move(2); });
  $j('#icons #icon-4').click(function() {  $j.scrollify.move(3); });

  $j(function() {
    if ($j(window).width() >= 768) {
      $j.scrollify({
        section : ".pane-wrapper",
        scrollSpeed: 1000,
        scrollbars: false,
        before:function() {     $j.scrollify.disable();
                                //audio_swoosh.play();
                                //$j('.icon, .title').fadeOut(150);
                                $j('.title').fadeOut(150);

                                $j('#icon-1').animate({'margin-left':'-100px', 'margin-top':'50px', 'height':'0', 'width':'0', 'opacity':'0'}, 100);
                                $j('#icon-2').animate({'margin-left':'-50px', 'margin-top':'50px', 'height':'0', 'width':'0', 'opacity':'0'}, 100);

                                $j('#icon-3').animate({'margin-left':'50px', 'margin-top':'50px', 'height':'0', 'width':'0', 'opacity':'1'}, 100);
                                $j('#icon-4').animate({'margin-left':'100px', 'margin-top':'50px', 'height':'0', 'width':'0', 'opacity':'1'}, 100);

                                if ($j('video source').attr('src') != '/wp-content/themes/portfolio/videos/nathan-working-2.mp4') {
                                  $j('video source').attr('src', '/wp-content/themes/portfolio/videos/nathan-working-2.mp4');
                                  $j('video')[0].load();
                                }
                          },
        after:function(id)  {   $j('.icon').fadeIn(200);

                                var icon_size = '100px';

                                if ($j(window).width() <= 768) {
                                  icon_size = '80px';
                                }

                                $j('#icon-1').animate({'margin-left':'20px', 'margin-top':'0', 'height': icon_size, 'width': icon_size, 'opacity':'1'}, 200);
                                $j('#icon-2').animate({'margin-left':'20px', 'margin-top':'0', 'height': icon_size, 'width': icon_size, 'opacity':'1'}, 200);

                                $j('#icon-3').animate({'margin-left':'20px', 'margin-top':'0', 'height': icon_size, 'width': icon_size, 'opacity':'1'}, 200);
                                $j('#icon-4').animate({'margin-left':'20px', 'margin-top':'0', 'height': icon_size, 'width': icon_size, 'opacity':'1'}, 200);


                                if (id==0) {
                                  $j('.title').html('<span class="title-name">Nathan<br />Harris</span>');
                                }
                                if (id==1) {
                                  $j('.title').html('Portfolio');
                                }
                                if (id==2) {
                                  $j('.title').html('Skills');
                                }
                                if (id==3) {
                                  $j('.title').html('Hire Me');
                                }

                                $j('.title').fadeIn(400);

                                setTimeout(function() {
                                                        //audio_hit.play();
                                                        $j.scrollify.enable();
                                                      }, 1300);
                            },
      });
    }
  });

  $j(window).scroll(function() { scroll_handler(); });

  if ($j('body').hasClass('home')) {
    setInterval(function () {
      var pos1 = parseInt($j('.home .pane-code-1').css('background-position-y').replace('px',''));
      var pos2 = parseInt($j('.home .pane-code-2').css('background-position-y').replace('px',''));
      var pos3 = parseInt($j('.home .pane-code-3').css('background-position-y').replace('px',''));

      $j('.home .pane-code-1').css('background-position-y', (pos1 + 1) + 'px');
      $j('.home .pane-code-2').css('background-position-y', (pos2 + 2) + 'px');
      $j('.home .pane-code-3').css('background-position-y', (pos3 + 3) + 'px');
    }, 50);
  }

  function scroll_handler() {
    var pos = $j(window).scrollTop();
    var h = $j(window).height();
    var w = $j(window).width();

    if (pos > (h * .9)) {
      $j('#icons').addClass('icon-adjust');
    } else {
      $j('#icons').removeClass('icon-adjust');
    }

    $j('.home .pane-code-1').css('background-position-y', (pos/-2));
    $j('.home .pane-code-2').css('background-position-y', (pos/-4));
    $j('.home .pane-code-3').css('background-position-y', (pos/-10));

    $j('#interior-header-bg-1').css('background-position-y', (1425 + pos/-2));
    $j('#interior-header-bg-2').css('background-position-y', (1425 + pos/-4));
    $j('#interior-header-bg-3').css('background-position-y', (1425 + pos/-10));
  }

});

/************************/
/*   HOME SLIDER CODE   */
/************************/

/* home slider variables */
var current_slide = 1;
var slide_count = 99;
var animating = false;

function next_slide() {
  slide_count = $j('.portfolio-item').length;

  event.preventDefault();

  if (animating == true) {
    return;
  }

  animating = true;

  //audio_slide.play();

  var next_slide = current_slide + 1;

  if (next_slide > slide_count) { next_slide = 1; }

  $j('#portfolio-item-' + next_slide).css('left', '100%');
  $j('#portfolio-item-' + next_slide).css('opacity', '0');

  $j('#portfolio-item-' + next_slide + ' .screenshot-title ').css('left', '100%');
  $j('#portfolio-item-' + next_slide + ' .screenshot-url ').css('left', '100%');

  $j('#portfolio-item-' + next_slide + ' .screenshot-title ').css('opacity', '0');
  $j('#portfolio-item-' + next_slide + ' .screenshot-url ').css('opacity', '0');

  $j('.arrow').animate({'opacity' : '0'}, 300);

  $j('.role').delay(200).animate({'opacity' : '0'}, 300);
  $j('.tasks').delay(300).animate({'opacity' : '0'}, 300);
  $j('.tech').delay(400).animate({'opacity' : '0'}, 300);

  $j('#portfolio-item-' + current_slide + ' .screenshot-title ').delay(300).animate({'left' : '-100%', 'opacity' : '0'}, 600);

  $j('#portfolio-item-' + current_slide + ' .screenshot-url ').delay(500).animate({'left' : '-100%', 'opacity' : '0'}, 600);

  $j('#portfolio-item-' + current_slide).delay(600).animate({'left' : '-100%', 'opacity' : '0'}, 600);
  $j('#portfolio-item-' + next_slide).delay(600).animate({'left' : '15px', 'opacity' : '1'}, 600);

  $j('#portfolio-item-' + next_slide + ' .screenshot-title ').delay(500).animate({'left' : '0px', 'opacity' : '1'}, 600);
  $j('#portfolio-item-' + next_slide + ' .screenshot-url ').delay(600).animate({'left' : '0', 'opacity' : '1'}, 600);

  $j('.role').delay(800).animate({'opacity' : '1'}, 600);
  $j('.tasks').delay(900).animate({'opacity' : '1'}, 600);
  $j('.tech').delay(1000).animate({'opacity' : '1'}, 600);

  $j('.arrow').delay(1800).animate({'opacity' : '1'}, 100);

  current_slide = next_slide;

  setTimeout(function() { animating = false; }, 2000);
}

function prev_slide() {
  slide_count = $j('.portfolio-item').length;

  event.preventDefault();

  if (animating == true) {
    return;
  }

  animating = true;

//  audio_slide.play();

  var next_slide = current_slide - 1;

  if (next_slide == 0) { next_slide = slide_count; }

  $j('#portfolio-item-' + next_slide).css('left', '-100%');
  $j('#portfolio-item-' + next_slide).css('opacity', '0');

  $j('#portfolio-item-' + next_slide + ' .screenshot-title ').css('left', '-100%');
  $j('#portfolio-item-' + next_slide + ' .screenshot-url ').css('left', '-100%');

  $j('#portfolio-item-' + next_slide + ' .screenshot-title ').css('opacity', '0');
  $j('#portfolio-item-' + next_slide + ' .screenshot-url ').css('opacity', '0');

  $j('.arrow').animate({'opacity' : '0'}, 300);

  $j('.role').delay(200).animate({'opacity' : '0'}, 300);
  $j('.tasks').delay(300).animate({'opacity' : '0'}, 300);
  $j('.tech').delay(400).animate({'opacity' : '0'}, 300);

  $j('#portfolio-item-' + current_slide + ' .screenshot-title ').delay(300).animate({'left' : '100%', 'opacity' : '0'}, 600);
  $j('#portfolio-item-' + current_slide + ' .screenshot-url ').delay(500).animate({'left' : '100%', 'opacity' : '0'}, 600);

  $j('#portfolio-item-' + current_slide).delay(600).animate({'left' : '100%', 'opacity' : '0'}, 600);
  $j('#portfolio-item-' + next_slide).delay(600).animate({'left' : '15px', 'opacity' : '1'}, 600);

  $j('#portfolio-item-' + next_slide + ' .screenshot-title ').delay(500).animate({'left' : '0px', 'opacity' : '1'}, 600);
  $j('#portfolio-item-' + next_slide + ' .screenshot-url ').delay(600).animate({'left' : '0', 'opacity' : '1'}, 600);

  $j('.role').delay(800).animate({'opacity' : '1'}, 600);
  $j('.tasks').delay(900).animate({'opacity' : '1'}, 600);
  $j('.tech').delay(1000).animate({'opacity' : '1'}, 600);

  $j('.arrow').delay(1800).animate({'opacity' : '1'}, 100);

  current_slide = next_slide;

  setTimeout(function() { animating = false; }, 2000);
}

/************************/
/*   SKILLS PAGE        */
/************************/

$j(document).ready(function() {

  $j('.skill-filter').click(function() {
    $j('html, body').animate({scrollTop: ($j('#pane-' + $j(this).attr('id')).offset().top)}, 1000);
  });

  $j('#form-filter-select').change(function() {
    $j('html, body').animate({scrollTop: ($j('#pane-' + $j(this).val()).offset().top) - 50}, 1000);
  });

  var group1 = ['#pane-drupal', '#pane-wordpress'];
  var group2 = ['#pane-devops', '#pane-services', '#pane-apis'];
  var group3 = ['#pane-tools', '#pane-front-end-coding', '#pane-database'];

  var sm_group1 = ['#pane-drupal', '#pane-wordpress'];
  var sm_group2 = ['#pane-devops', '#pane-services'];
  var sm_group3 = ['#pane-apis', '#pane-tools'];
  var sm_group4 = ['#pane-front-end-coding', '#pane-database'];

  if ($j(window).width() <= 992) {
      console.log('resize small');
    nrh_equal_height(sm_group1);
    nrh_equal_height(sm_group2);
    nrh_equal_height(sm_group3);
    nrh_equal_height(sm_group4);
  }
  else {
    nrh_equal_height(group1);
    nrh_equal_height(group2);
    nrh_equal_height(group3);
  }

  $j(window).resize(function () {
    if ($j(window).width() <= 992) {
      nrh_equal_height(sm_group1);
      nrh_equal_height(sm_group2);
      nrh_equal_height(sm_group3);
      nrh_equal_height(sm_group4);
    }
    else {
      nrh_equal_height(group1);
      nrh_equal_height(group2);
      nrh_equal_height(group3);
    }
  });

  function nrh_equal_height(divs) {
    var height = 0;

    for ( var i = 0, l = divs.length; i < l; i++ ) {
        $j(divs[i]).css('height', 'auto');
    }

    for ( var i = 0, l = divs.length; i < l; i++ ) {
      if ($j(divs[i]).height() > height) {
        height = $j(divs[i]).height() + 48;
      }
    }

    for ( var i = 0, l = divs.length; i < l; i++ ) {
      if ($j(window).width() < 768) {
        $j(divs[i]).css('height', 'auto');
      }
      else {
        $j(divs[i]).css('height', height + 'px');
      }
    }
  }
});

/************************/
/*   PORTFOLIO PAGE     */
/************************/

$j(window).on("load", function() {

  if ($j('#portfolio-grid').length) {
    $j('#portfolio-grid').isotope({
      itemSelector: '.grid-item',
      layoutMode: 'packery',
    });

    setTimeout(function() {
      $j('#portfolio-grid').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'packery',
      });
    }, 1000);
  }

  $j('.grid-filter').click(function() {

    Cookies.set('filter', $j(this).attr('id'), {expires:2});

    $j('#filter a').removeClass('active');
    $j(this).addClass('active');

    if ($j(this).attr('id') == 'all') {
      $j('#portfolio-grid').isotope({ filter: '*'});
    } else {
      $j('#portfolio-grid').isotope({ filter: '.grid-item.' + $j(this).attr('id')});
    }
  });

  $j('#portfolio-form-filter-select').change(function() {
    Cookies.set('filter', $j(this).val(), {expires:2});
    if ($j(this).val() == 'all') {
      $j('#portfolio-grid').isotope({ filter: '*'});
    } else {
      $j('#portfolio-grid').isotope({ filter: '.grid-item.' + $j(this).val()});
    }
  });

  var portfolio_filter = Cookies.get('filter');

  if ((portfolio_filter == '') || (portfolio_filter === undefined)) {
    portfolio_filter = 'all';
  }

  var qs = getUrlVars();

  if (qs.hasOwnProperty("filter")) {
    Cookies.set('filter', qs["filter"], {expires:2});

    $j("#filter a").removeClass('active');

    $j("#" + qs["filter"]).addClass('active');

    $j('#portfolio-grid').isotope({ filter: '.grid-item.' + qs["filter"]});

  } else {

    $j("#" + portfolio_filter).addClass('active');

    if (portfolio_filter == 'all') {
      $j('#portfolio-grid').isotope({ filter: '*'});
    } else {
      $j('#portfolio-grid').isotope({ filter: '.grid-item.' + portfolio_filter});
    }
  }

  function getUrlVars() {
      var vars = [], hash;
      var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
      for(var i = 0; i < hashes.length; i++)
      {
          hash = hashes[i].split('=');
          vars.push(hash[0]);
          vars[hash[0]] = hash[1];
      }
      return vars;
  }

});

/************************/
/*   PROJECT PAGE       */
/************************/

$j(document).ready(function() {

  $j('#project-form-filter-select').change(function () {
    var next_project = null;

    Cookies.set('filter', $j(this).val(), {expires:2});

    $j.ajax({
      'async': false,
      'type': "POST",
      'global': false,
      'dataType': 'html',
      'url': "/project-next",
      'data': { 'current_project': -999, 'project_category': $j(this).val()},
      'success': function (data) {
        next_project = data;
      }
    });

    window.location = next_project;
  });

  $j('#project-prev').click(function() {
    var prev_project = null;

    $j.ajax({
      'async': false,
      'type': "POST",
      'global': false,
      'dataType': 'html',
      'url': "/project-prev",
      'data': { 'current_project': $j('#project-id').data('id'), 'project_category': $j('#portfolio-form-filter-select').val()},
      'success': function (data) {
        prev_project = data;
      }
    });

    window.location = prev_project;
  });

  $j('#project-next').click(function() {
    var next_project = null;

    $j.ajax({
      'async': false,
      'type': "POST",
      'global': false,
      'dataType': 'html',
      'url': "/project-next",
      'data': { 'current_project': $j('#project-id').data('id'), 'project_category': $j('#portfolio-form-filter-select').val()},
      'success': function (data) {
        next_project = data;
      }
    });

    window.location = next_project;
  });

  $j('.item-filter').click(function () {
    var next_project = null;

    Cookies.set('filter', $j(this).attr('id'), {expires:2});

    $j.ajax({
      'async': false,
      'type': "POST",
      'global': false,
      'dataType': 'html',
      'url': "/project-next",
      'data': { 'current_project': -999, 'project_category': $j(this).attr('id')},
      'success': function (data) {
        next_project = data;
      }
    });

    window.location = next_project;
  });

  $j('#project-prev-slide').click(function() {
    var prev_project = null;

    $j.ajax({
      'async': false,
      'type': "POST",
      'global': false,
      'dataType': 'html',
      'url': "/project-prev",
      'data': { 'current_project': $j('#project-id').data('id'), 'project_category': $j('#project-form-filter-select').val()},
      'success': function (data) {
        prev_project = data;
      }
    });

    window.location = prev_project;
  });

  $j('#project-next-slide').click(function() {
    var next_project = null;

    $j.ajax({
      'async': false,
      'type': "POST",
      'global': false,
      'dataType': 'html',
      'url': "/project-next",
      'data': { 'current_project': $j('#project-id').data('id'), 'project_category': $j('#project-form-filter-select').val()},
      'success': function (data) {
        next_project = data;
      }
    });

    window.location = next_project;
  });

});

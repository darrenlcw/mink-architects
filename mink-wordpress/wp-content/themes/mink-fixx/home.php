<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=1280, initial-scale=1.0">
    
    <title>Mink Architects</title>
    
    <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_url'); ?>" type="text/css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" type="text/css">

    <script type="text/javascript" src="//use.typekit.net/mwm1qtm.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  </head>

  <body>
    <div class="opening-curtain">
      <div class="curtain-top">
        <div class="logo">
          <div class="circle">
            <div id="m">m</div>
            <div id="i">i</div>
            <div id="n">n</div>
            <div id="k">k</div>
          </div>
        </div>
      </div>
    </div>

    <div class="background-slider">
      <div class="background current" style="url(<?php echo get_template_directory_uri(); ?>/assets/img/backgrounds/1.jpg) center no-repeat;"></div>
      <div class="background next" style="url(<?php echo get_template_directory_uri(); ?>/assets/img/backgrounds/2.jpg) center no-repeat;"></div>
    </div>

    <div class="topbar">
      <div class="bar">
        <div class="logo">
          <a href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/small-logo.png" />
          </a>
        </div>
        <div id="menu-button">
          menu
        </div>
      </div>
      <div id="mob-nav" class="navigation">
        <ul>
          <li><a href="<?php echo home_url(); ?>/projects">Projects</a></li>
          <li><a href="<?php echo home_url(); ?>/clientele">Clientele</a></li>
          <li><a href="<?php echo home_url(); ?>/awards">Awards</a></li>
          <li><a href="<?php echo home_url(); ?>/media">Media</a></li>
          <li><a href="<?php echo home_url(); ?>/us">Us</a></li>
        </ul>
      </div>
    </div>

    <div class="sidebar-hitbox">
      <div class="sidebar">
        <div class="logo-container">
          <div class="logo"></div>
        </div>
        <div class="navigation">
          <ul>
            <li><a href="<?php echo home_url(); ?>">Home</a></li>
            <li><a href="<?php echo home_url(); ?>/projects">Projects</a></li>
            <li><a href="<?php echo home_url(); ?>/clientele">Clientele</a></li>
            <li><a href="<?php echo home_url(); ?>/awards">Awards</a></li>
            <li><a href="<?php echo home_url(); ?>/media">Media</a></li>
            <li><a href="<?php echo home_url(); ?>/us">Us</a></li>
          </ul>
        </div>
      </div>
    </div>
  </body>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script>
    $(document).ready(function() {
      var curtainDelay = 2000;
      var curtainAnimDuration = 1000;
      var openSidebarDelay = 200;
      var hideSidebarDelay = 2000;
      var sidebarAnimDuration = 300;
      var seedAnimDuration = 1000;
      var seedInterval = 300;
      var seedHoldDuration = 2000;

      $(".sidebar").filter(":not(:animated)").animate({
        left: "-20%"
      }, 0, "easeInQuad", function() {
        $(this).removeClass("active");
      });

      setTimeout(function() {
        sesameSeed();
      }, 500);  

      /* Hitbox */
      $(".sidebar-hitbox").mouseenter(function() {
        clearTimeout(hideSidebar);
        openSidebar();
      });

      $(".sidebar-hitbox").mouseleave(function() {
        closeSidebar();
      });

      function sesameSeed() {
        $(".circle").animate({
          opacity: "1"
        }, seedAnimDuration, "easeInQuint");

        setTimeout(function() {
          $("#m").animate({
            opacity: "1"
          }, seedAnimDuration, "easeOutQuint");
        }, seedInterval);

        setTimeout(function() {
          $("#i").animate({
            opacity: "1"
          }, seedAnimDuration, "easeOutQuint");
        }, seedInterval*2);


        setTimeout(function() {
          $("#n").animate({
            opacity: "1"
          }, seedAnimDuration, "easeOutQuint");
        }, seedInterval*3);


        setTimeout(function() {
          $("#k").animate({
            opacity: "1"
          }, seedAnimDuration, "easeOutQuint", function() {
            setTimeout(function() {
              openSesame();
            }, seedHoldDuration);
          });
        }, seedInterval*4);
      }

      function openSesame() {
        $(".curtain-top").animate({
          opacity: "0"
        }, curtainAnimDuration, "easeOutQuint", function() {
          $(".opening-curtain").remove();

          launchSidebar = setTimeout(function() {
            openSidebar();
            
            timedSlide = setTimeout(function() {
              backgroundSlide();
            }, autoSlideTimeout);
          }, openSidebarDelay);

          hideSidebar = setTimeout(function() {
            closeSidebar();
          }, hideSidebarDelay + sidebarAnimDuration + openSidebarDelay);
        });
      }    

      function openSidebar() {
        $(".sidebar").stop();
        $(".sidebar").filter(":not(:animated)").animate({
          left: 0
        }, sidebarAnimDuration, "easeOutQuad", function() {
          $(this).addClass("active");
        });
      }

      function closeSidebar() {
        $(".sidebar").stop();
        $(".sidebar").filter(":not(:animated)").animate({
          left: "-20%"
        }, sidebarAnimDuration, "easeInQuad", function() {
          $(this).removeClass("active");
        });
      }

      var timedSlide;
      var autoSlideTimeout = 3000;
      var backgroundAnimDuration = 2000;

      var backgrounds = new Array();
      backgrounds[0] = "1.jpg";
      backgrounds[1] = "2.jpg";
      backgrounds[2] = "3.jpg";
      backgrounds[3] = "4.jpg";

      var current = 0;

      function backgroundSlide() {
        if(current < backgrounds.length - 1) {
          $(".background-slider .next").css("background-image", "url(<?php echo get_template_directory_uri(); ?>/assets/img/backgrounds/" + backgrounds[current + 1] + ")");
          $(".background-slider .next").animate({
            opacity: 1
          }, backgroundAnimDuration, "easeInOutQuad", function() {
            $(".background-slider .current").css("background-image", "url(<?php echo get_template_directory_uri(); ?>/assets/img/backgrounds/" + backgrounds[current + 1] + ")");
            $(".background-slider .next").css("opacity", "0");
            current++;
            timedSlide = setTimeout(function() {
              backgroundSlide();
            }, autoSlideTimeout);
          });
        } else {
          $(".background-slider .next").css("background-image", "url(<?php echo get_template_directory_uri(); ?>/assets/img/backgrounds/" + backgrounds[0] + ")");
          $(".background-slider .next").animate({
            opacity: 1
          }, backgroundAnimDuration, "easeInOutQuad", function() {
            $(".background-slider .current").css("background-image", "url(<?php echo get_template_directory_uri(); ?>/assets/img/backgrounds/" + backgrounds[0] + ")");
            $(".background-slider .next").css("opacity", "0");
            current = 0;
            timedSlide = setTimeout(function() {
              backgroundSlide();
            }, autoSlideTimeout);
          });
        }
      }

      $("#menu-button").click(function() {
        $("#mob-nav").toggle(0);
      });
    });
  </script>
</html>
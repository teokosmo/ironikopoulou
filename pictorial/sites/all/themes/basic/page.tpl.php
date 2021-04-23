<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

  <head>
    <title><?php print preg_replace('/\d{4}-\d{2}-\d{2}./', '', $head_title); ?></title>
    <?php print $head; ?>
    <?php print $styles; ?>
    <!--[if lte IE 6]><style type="text/css" media="all">@import "<?php print base_path() . path_to_theme() ?>/css/ie6.css";</style><![endif]-->
    <!--[if IE 7]><style type="text/css" media="all">@import "<?php print base_path() . path_to_theme() ?>/css/ie7.css";</style><![endif]-->
    <?php print $scripts; ?>
    <script type="text/javascript" src="<?php print base_path() . path_to_theme() ?>/js/custom.js"></script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25974977-1']);
  _gaq.push(['_setDomainName', 'ironikopoulou.gr']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
  </head>

  <body class="<?php print $body_classes; ?>">
    
    <!--div id="skip"><a href="#content">Skip to Content</a> <a href="#navigation">Skip to Navigation</a></div-->  
    <div id="page">

 
    <!-- ______________________ MAIN _______________________ -->

    <div id="main" class="clearfix">
    
      <div id="content">
        <div id="content-inner" class="inner column center">

          <?php if ($content_top): ?>
            <div id="content-top">
              <?php print $content_top; ?>
            </div> <!-- /#content-top -->
          <?php endif; ?>

          <?php if ($breadcrumb || $title || $mission || $messages || $help || $tabs): ?>
            <div id="content-header">

              <?php print $breadcrumb; ?>

              <?php if ($title): ?>
                <h1 class="title"><?php  
                if( preg_match('/^\d{4}-\d{2}-\d{2}/',$title) ) print substr($title,11);
                else print $title; ?></h1>
              <?php endif; ?>
			<?php if ($tabs): ?>
                <div class="tabs"><?php print $tabs; ?></div>
              <?php endif; ?>
            </div> <!-- /#content-header -->
          <?php endif; ?>

          <div id="content-area">
             <?php if ($mission): ?>
                <div id="mission"><?php print $mission; ?></div>
              <?php endif; ?>
              <?php print $messages; ?>
              <?php print $help; ?> 
              
              <?php print $content; ?>
          </div> <!-- /#content-area -->

          <?php print $feed_icons; ?>

          <?php if ($content_bottom): ?>
            <div id="content-bottom">
              <?php print $content_bottom; ?>
            </div><!-- /#content-bottom -->
          <?php endif; ?>

          </div>
        </div> <!-- /content-inner /content -->

        <?php if (!empty($primary_links) or !empty($secondary_links)): ?>
          <!--div id="navigation" class="menu < ? php if (!empty($primary_links)) { print "with-main-menu"; } if (!empty($secondary_links)) { print " with-sub-menu"; } ? >">
            < ? php if (!empty($primary_links)){ print theme('links', $primary_links, array('id' => 'primary', 'class' => 'links main-menu')); } ? >
            < ? php if (!empty($secondary_links)){ print theme('links', $secondary_links, array('id' => 'secondary', 'class' => 'links sub-menu')); } ? >
          </div--> <!-- /navigation -->
        <?php endif; ?>

        
          <div id="sidebar-first" class="column sidebar first">
            <div id="sidebar-first-inner" class="inner">
            	<?php if (!empty($site_name)): ?>
            		<h1 id="site-name">
                		<a href="<?php print $front_page ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            		</h1>
          	 <?php endif; ?>
          	 	<div id="left-sidebar-content">
             		<?php if ($left): ?> <?php print $left; ?> <?php endif; ?> <!-- /sidebar-left -->
             	</div>
            </div>
             <?php 
             //print $search_box; 
             ?>
          </div>
          
          <div id="sidebar-second" class="column sidebar second">
            <div id="sidebar-second-inner" class="inner"><a title="Ηρώ Νικοπούλου Σελίδα" href="http://www.ironikopoulou.gr"><img src="<?php print base_path() . path_to_theme() ?>/css/images/irwLogo.gif"/></a></div>
          </div>
        

      </div> <!-- /main -->

      <!-- ______________________ FOOTER _______________________ -->

      <?php if(!empty($footer_message) || !empty($footer_block)): ?>
        <div id="footer">
          <?php print $footer_message; ?>
          <?php print $footer_block; ?>
        </div> <!-- /footer -->
      <?php endif; ?>

    </div> <!-- /page -->
    <?php print $closure; ?>
  </body>
</html>

<?php
// $Id$

/**
 * @file
 * Displays a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or
 *   'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   element.
 * - $head: Markup for the HEAD element (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the
 *   current path, whether the user is logged in, and so on.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled in
 *   theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been
 *   disabled in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been
 *   disabled.
 * - $primary_links (array): An array containing primary navigation links for
 *   the site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links
 *   for the site, if they have been configured.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the
 *   view and edit tabs when displaying a node).
 * - $content: The main content of the current Drupal page.
 * - $right: The HTML for the right sidebar.
 * - $node: The node object, if there is an automatically-loaded node associated
 *   with the page, and the node ID is the second argument in the page's path
 *   (e.g. node/12345 and node/12345/revisions, but not comment/reply/12345).
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic
 *   content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

  <head>
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>
    <?php print $styles; ?>
    <?php print $scripts; ?>

    <!--[if IE 8]>
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_path() . drupal_get_path('theme', 'gordon') ?>/css/ie8.css" />
    <![endif]-->
    <!--[if IE 7]>
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_path() . drupal_get_path('theme', 'gordon') ?>/css/ie7.css" />
    <![endif]-->
    <?php
    if ($ie6nomore) {
      ?>
        <!--[if lt IE 7]>
        <div style='border: 1px solid #F7941D; background: #FEEFDA; text-align: center; clear: both; height: 75px; position: relative;'>
          <div style='position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;'><a href='#' onclick='javascript:this.parentNode.parentNode.style.display="none"; return false;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-cornerx.jpg' style='border: none;' alt='Close this notice'/></a></div>
          <div style='width: 640px; margin: 0 auto; text-align: left; padding: 0; overflow: hidden; color: black;'>
            <div style='width: 75px; float: left;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-warning.jpg' alt='Warning!'/></div>
            <div style='width: 275px; float: left; font-family: Arial, sans-serif;'>
              <div style='font-size: 14px; font-weight: bold; margin-top: 12px;'>You are using an outdated browser</div>
              <div style='font-size: 12px; margin-top: 6px; line-height: 12px;'>For a better experience using this site, please upgrade to a modern web browser.</div>
            </div>
            <div style='width: 75px; float: left;'><a href='http://www.firefox.com' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-firefox.jpg' style='border: none;' alt='Get Firefox 3.5'/></a></div>
            <div style='width: 75px; float: left;'><a href='http://www.browserforthebetter.com/download.html' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-ie8.jpg' style='border: none;' alt='Get Internet Explorer 8'/></a></div>
            <div style='width: 73px; float: left;'><a href='http://www.apple.com/safari/download/' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-safari.jpg' style='border: none;' alt='Get Safari 4'/></a></div>
            <div style='float: left;'><a href='http://www.google.com/chrome' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-chrome.jpg' style='border: none;' alt='Get Google Chrome'/></a></div>
          </div>
        </div>
        <![endif]-->
      <?php
    }
    ?>
  </head>
  <body class="<?php print $body_classes; ?>">
    <div id="header">
      <div id="header-inner">
        <div id="header-top">
          <?php if (!empty($logo)): ?>
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            </a>
          <?php endif; ?>

          <?php if (!empty($site_slogan)): ?>
            <span id="site-slogan"><?php print $site_slogan; ?></span>
          <?php endif; ?>

          <?php if (!empty($search_box)): ?>
            <div id="search-box"><?php print $search_box; ?></div>
          <?php endif; ?>
        </div> <!-- /header-top -->

        <div id="header-bottom">
          <?php if (!empty($primary_links)): ?>
            <div id="primary">
              <?php print theme('links', $primary_links, array('class' => 'links primary-links')); ?>
            </div>
          <?php endif; ?>
        </div> <!-- /header-bottom -->
      </div> <!-- /header-inner -->
    </div> <!-- /header -->
    <div id="page">

      <?php if (!empty($secondary_links)): ?>
        <div id="secondary">
          <?php print theme('links', $secondary_links, array('class' => 'links secondary-links')); ?>
        </div>
      <?php endif; ?>      

      <div id="container">

      <?php if (!empty($left)): ?>
        <div id="sidebar-left" class="sidebar">
          <?php print $left; ?>
        </div>
      <?php endif; ?>

      <div id="main">
        <?php if (!empty($breadcrumb)): ?><div id="breadcrumb"><div><?php print $breadcrumb; ?></div></div><?php endif; ?>
        <?php if (!empty($title)): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php if (!empty($tabs)): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>
        <?php if (!empty($messages)): print $messages; endif; ?>
        <?php if (!empty($help)): print $help; endif; ?>
        <?php print $content; ?>
      </div> <!-- /main -->

      <?php if (!empty($right)): ?>
        <div id="sidebar-right" class="sidebar">
          <?php print $right; ?>
        </div>
      <?php endif; ?>

      </div> <!-- /container -->

    </div> <!-- /page -->

    <div id="footer" class="c-b">
      <div class="footer-inner">
        <?php if (!empty($footer)): print $footer; endif; ?>
        <div class="c-b"></div>
      </div>
      <div id="footer-message">
        <div class="footer-inner">
          <a href="http://premiumcmsthemes.com" target="_blank" class="pt_logo"></a>
          <?php print $footer_message; ?>
          <?php print $feed_icons; ?>
        </div>
      </div> <!-- /footer-message -->
    </div> <!-- /footer -->

    <?php print $closure; ?>
  </body>
</html>
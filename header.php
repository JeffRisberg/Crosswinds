<?php
$crosswinds_Mode = get_settings('crosswinds_Mode');
if (!$crosswinds_Mode) {
  $crosswinds_Mode = 'blue';
  update_option('crosswinds_Mode', $crosswinds_Mode);
}

$crosswinds_Sidebar = get_settings('crosswinds_Sidebar');
if (!$crosswinds_Sidebar) {
  $crosswinds_Sidebar = 'Left';
  update_option('crosswinds_Sidebar', $crosswinds_Sidebar);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
 <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
 <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

 <title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

 <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
 <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/<?php echo get_settings( 'crosswinds_Mode' ) . ".css"; ?>" type="text/css" media="screen" />
 <?php if ($crosswinds_Sidebar == "Left") { ?>
 <style type="text/css" media="screen">
   #content { float: right; }
   #sidebar { float: left; }
 </style>
 <?php } ?>

 <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
 <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
 <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

 <?php wp_get_archives('type=monthly&format=link'); ?>

 <?php wp_head(); ?>
</head>
<body>
<div id="page">
<div id="header">
  <div id="headerimg">
    <h1><a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a></h1>
    <div class="description"><?php bloginfo('description'); ?></div>
  </div> 
</div>
<div id="navbar">
    <ul class="level1">
     <li><a href="<?php bloginfo('url'); ?>/">Home</a></li>
     <?php
      if (function_exists("crosswinds_pages_nav")) {
         crosswinds_pages_nav("sort_column=menu_order&list_tag=0&show_all_parents=1&show_root=1");
      }
      else {
	  echo("</ul>");
      }
     ?>
</div>

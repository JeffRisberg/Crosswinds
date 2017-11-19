<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>
<div id="container">
    <div id="content">
    <div class="pagetitle">
    <h2>Links</h2>
    </div>
    <ul>
      <?php get_links_list(); ?>
    </ul>
    </div><!-- content -->
	
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

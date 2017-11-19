<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>
<div id="container">
    <div id="content">
    <div class="pagetitle">
    <h2>Archives</h2>
    </div>
    <?php include (TEMPLATEPATH . '/searchform.php'); ?>

    <h3>Archives by Month:</h3>
    <ul>
      <?php wp_get_archives('type=monthly'); ?>
    </ul>

    <h3>Archives by Subject:</h3>
    <ul>
     <?php wp_list_cats(); ?>
    </ul>
    </div><!-- content -->	
    
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

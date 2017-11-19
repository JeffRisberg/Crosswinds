<?php 
$showauthor = get_settings('crosswinds_ShowAuthor');
if (!$showauthor) {
  $showauthor = 'true';
  update_option('crosswinds_ShowAuthor', $showauthor);
}
?>

<?php get_header(); ?>
<div id="container">
	<div id="content">

	  <?php if (have_posts()) : ?>

	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	  <?php /* If this is a category archive */ if (is_category()) { ?>		
		<div class="pagetitle">		
		<h2>Archive for the '<?php echo single_cat_title(); ?>' Category</h2>
              </div>
		
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<div class="pagetitle">
		<h2>Archive for <?php the_time('F jS, Y'); ?></h2>
		</div>
		
	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<div class="pagetitle">
		<h2>Archive for <?php the_time('F, Y'); ?></h2>
		</div>

	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<div class="pagetitle">
		<h2>Archive for <?php the_time('Y'); ?></h2>
		</div>
		
	  <?php /* If this is a search */ } elseif (is_search()) { ?>
		<div class="pagetitle">
		<h2>Search Results</h2>
		</div>
		
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<div class="pagetitle">
		<h2>Author Archive</h2>
		</div>

	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<div class="pagetitle">
		<h2>Blog Archives</h2>
		</div>

	  <?php } ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>

		<?php while (have_posts()) : the_post(); ?>
			<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<div class="postheader"><?php the_time('l, F jS, Y') ?> 
				<?php if ($showauthor == 'true') {
					echo 'by '; the_author();
				} ?>
				<?php edit_post_link('Edit','| ',''); ?> </div>
				<div class="postcontent">
					<?php the_content() ?>
				</div>
				<div class="postfooter">Posted in <?php the_category(', ') ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div> 
			</div>
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>
	
	<?php else : ?>
		<h2 class="pagetitle">Not Found</h2>
              <p>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
              </p>
	<?php endif; ?>
		
	</div>

	<?php get_sidebar(); ?>
<div style="clear:both;height:1px;overflow:hidden;font-size:0.1em;">&nbsp;</div>
</div>
<?php get_footer(); ?>

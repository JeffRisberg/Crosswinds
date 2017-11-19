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
		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="postheader"><?php the_time('F jS, Y') ?> 
				<?php if ($showauthor == 'true') {
					echo 'by '; the_author();
				} ?>
				<?php edit_post_link('Edit','| ',''); ?></div>
				<div class="postcontent">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
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
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
	<?php endif; ?>
	</div><!-- content -->

	<?php get_sidebar(); ?>
<div style="clear:both;height:1px;overflow:hidden;font-size:0.1em;">&nbsp;</div>
</div>
<?php get_footer(); ?>



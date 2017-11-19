<?php get_header(); ?>
<div id="container">
	<div id="content">
	<?php if (have_posts()) : ?>
		<h2 class="pagetitle">Search Results</h2>
		
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>

		<?php while (have_posts()) : the_post(); ?>				
			<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<div class="postheader">posted <?php the_time('l, F jS, Y') ?> <?php edit_post_link('Edit','| ',''); ?></div>				
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
		
	</div><!-- content -->

	<?php get_sidebar(); ?>
<div style="clear:both;height:1px;overflow:hidden;font-size:0.1em;">&nbsp;</div>
</div>
<?php get_footer(); ?>

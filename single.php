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
				
  	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>
	
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	
			<div class="postcontent">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				<?php wp_link_pages(); ?>
			</div>
	
			<div class="postfooter">
				This entry was posted 
				<?php if ($showauthor == 'true') {
					echo 'by '; the_author();
				} ?>
				on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
				and is filed under <?php the_category(', ') ?>.
				You can follow any responses to this entry through the <?php comments_rss_link('RSS 2.0'); ?> feed. 
						
				<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
					// Both Comments and Pings are open ?>
					You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a> from your own site.
						
				<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
					// Only Pings are Open ?>
					Responses are currently closed, but you can <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> from your own site.
						
				<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
					// Comments are open, Pings are not ?>
					You can skip to the end and leave a response. Pinging is currently not allowed.
			
				<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
					// Neither Comments, nor Pings are open ?>
					Both comments and pings are currently closed.			
						
				<?php } edit_post_link('Edit this entry.','',''); ?>
			</div>
		</div>
		
		<?php comments_template(); ?>
	
	<?php endwhile; else: ?>	
		<p>Sorry, no posts matched your criteria.</p>	
	<?php endif; ?>
	
	</div><!-- content -->
	
	<?php get_sidebar(); ?>
<div style="clear:both;height:1px;overflow:hidden;font-size:0.1em;">&nbsp;</div>
</div>
<?php get_footer(); ?>

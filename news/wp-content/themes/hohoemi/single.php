
<?php get_header();?>
<div class="pages section-light parent" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>">
	<div style="z-index:1000;">
		<p><?php the_time('Y')?>年<?php the_time('M')?><?php the_time('j')?>日（<?php the_time('D')?>）</p>
		<h2 class="display-3"><?php the_title();?><br><span class="text-center display-2">-</span></h2>
		<p class="text-center text-orange"><?php the_category(', ')?></p>
	</div>
</div>
<?php if (have_posts()): ?>
	<?php while (have_posts()): the_post();?>
		<div class="py-5 text-left">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 col-xs-12">
						<?php breadcrumb(); ?>
					</div>
					<div class="col-12 text-center">
						<h2><?php the_title();?></h2>
						<p class="lead"><?php the_content();?></p>
					</div>
				</div>
			<?php endwhile;?>
		</div>
		<!-- /.row -->
	<?php else: ?>
		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>
	<?php endif;?>
</div>
<?php get_footer();?>

<?php get_header();?>
<div class="pages section-light parent" style="background-image: url('<?php bloginfo('template_url');?>/images/header.jpg');">
  <div style="z-index:1000;">
    <h1 class="display-3">新着情報</h1>
  </div>
</div>
<div class="py-5 text-left">
  <div class="container">
    <div class="row align-items-center">
      <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post();?>
          <div class="col-sm-6 col-md-3 mt-3">
            <div class="card img-thumbnail">
              <img class="card-img-top" src="..." alt="画像">
              <div class="card-body px-2 py-3">
                <h5 class="card-title"><?php the_time('Y')?>年<?php the_time('M')?><?php the_time('j')?>日（<?php the_time('D')?>）</h5>
                <p class="card-text"><?php the_title();?></p>
                <p><?php the_content('Read the rest of this entry &raquo;');?></p>
                <p class="mb-0"><a href="<?php the_permalink()?>" class="btn btn-outline-dark btn-sm">続きを見る</a></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-sm-6.col-md-3 -->
        <?php endwhile;?>
      <?php else: ?>
        <h2>Not Found</h2>
        <p>Sorry, but you are looking for something that isn't here.</p>
      <?php endif;?>
    </div>
    <!-- /.row -->
  </div>
</div>
<?php get_footer();?>

<?php get_header(); ?>

<div class="container-page">
  <!--banner-->
  <?php 
    while(have_posts()): the_post(); 
      $name = get_post_meta($post->ID,'Nombre');
  ?>
    <header class="header-single">
      <h2><?php the_title();?></h2>
      <h3><?php echo $name[0]; ?></h3>
    </header>
    
    <div class="post-entry">
      <div class="container">
        <figure>
          <?php the_post_thumbnail('full'); ?>
        </figure>
        <div class="shares">
            <div class="fb-share-button" data-href="<?php the_permalink();?>" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>src=sdkpreparse">Compartir</a></div>
        </div>
      </div>
    </div>

  <?php
    endwhile; 
    wp_reset_query();
  ?>
  
</div><!-- /.container -->

<?php get_footer(); ?>
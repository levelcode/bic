<?php get_header(); ?>

<div class="container-site category">
	<!--banner-->
	<?php get_template_part('inc/banner'); ?>
	
	<header class="category-head">
		<img src="<?php bloginfo('template_url')?>/assets/img/header-junior.png" alt="Junior bic"/>
	</header>

	<div class="content-loop container">
		<?php
			query_posts( 'posts_per_page=-1&category_name=junior' );

			if(have_posts()):
				while (have_posts()):the_post();
					$name = get_post_meta($post->ID,'Nombre');
		?>

			<article class="post-item col-md-3 col-sm-2">
				<p class="counter">
					<span class="votes-n">
						<?php
						if (function_exists('wp_ulike_get_post_likes')):
						    if(wp_ulike_get_post_likes(get_the_ID())):
						    	echo wp_ulike_get_post_likes(get_the_ID());
						    else:
						    	echo "0";
						    endif;
						endif;
						?>
					</span>
					<span class="votes-txt">Votos</span>
				</p>
				<figure class="thumb">
					<a href="<?php the_permalink();?>">go</a>
					<span class="mask">
						<?php the_post_thumbnail('medium'); ?>
					</span>
					<div class="caption">
						<h3><?php echo $name[0]; ?></h3>
						<h4><?php the_title(); ?></h4>
					</div>		
				</figure>
				<a href="<?php the_permalink();?>" class="vota">Vota</a>
			</article>

		<?php
				endwhile;
			else:
				echo "<h1>No hay fotos para esta categoría</h1>";
			endif;
		?>
	</div>
	<!--loop post-->
</div><!-- /.container -->

<?php get_footer(); ?>
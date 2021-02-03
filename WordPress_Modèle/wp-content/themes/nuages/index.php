<?php get_header(); ?> 
    <div class="row"> 
        <div class="col-sm-8 blog-main"> 
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); get_template_part( 'content', get_post_format() ); endwhile; endif; ?> 
        </div> <!-- /.blog-main --> <?php get_sidebar(); ?> 
    </div> <!-- /.row --> 
<?php get_footer(); ?>

<!-- afficher articles selon catégories

<?php $catquery = new WP_Query( 'cat=72&posts_per_page=5' ); ?>
<ul>

<?php while($catquery->have_posts()) : $catquery->the_post(); ?>

<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
<?php endwhile;
wp_reset_postdata();
?>

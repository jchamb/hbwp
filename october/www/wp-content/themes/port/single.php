<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="outer-wrapper cf">
        <main class="page__content">

            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>

        </main>
    </div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>
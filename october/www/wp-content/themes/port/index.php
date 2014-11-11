<?php get_header(); ?>


    <div class="outer-wrapper cf">
        <main class="page__content page__content--full-width">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div <?php post_class(); ?>>
                <a href="<?php the_permalink(); ?>">
                    <h1><?php the_title(); ?></h1>
                    <?php the_excerpt(); ?>
                </a>
            </div>

            <?php endwhile; endif; ?>
        </main>
    </div>


<?php get_footer(); ?>
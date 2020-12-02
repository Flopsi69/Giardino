<?php get_header(); ?>
    <main class="main">
        <section class="section text-page">
            <div class="container">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>
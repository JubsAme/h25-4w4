<?php get_header(); ?>
    <h1><?php single_cat_title();?></h1>
    <p><?php echo category_description(); ?></p>
    <section class="populaire">
        <div class="global">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php get_template_part( 'gabarits/carte' ); ?>
            <?php endwhile; endif; ?>
                <?php
                $categories = get_the_category();

                if (!empty($categories)) {
                    $slug = $categories[0]->slug;
                    $cat_a_afficher = categorie_par_destination($slug);

                    if ($cat_a_afficher) {
                        echo '<a href="#" class="btn-categorie">Catégorie : ' . esc_html($cat_a_afficher) . '</a>';
                    }
                }
                ?>
        </div>
    </section>
    <?php get_footer(); ?>
   
</body>
</html>
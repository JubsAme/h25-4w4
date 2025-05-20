    <?php get_header(); ?>
    <?php get_template_part( 'gabarits/contenuhero' ); ?> 
    <section class="populaire">
        <div class="global">
            <?php if (have_posts()) : while (have_posts()) : the_post(); 
            if (in_category("galerie"))  {
                the_content() ;
            } else {    ?>
                <?php get_template_part( 'gabarits/carte' ); ?>
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
            <?php } ?>
            <?php endwhile; endif; ?>
        </div>
    </section>
    <section class="destination">
    <?php categories_liste("destination") ?>
        <h2 class="destination__titre">Articles de la catégorie</h2>
        <div class="destination__list"></div>
    </section>
    <footer></footer>
    <?php get_footer(); ?>
</body>
</html>
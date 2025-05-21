<?php get_header(); ?>
<section class="populaire">
    <div class="global">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article>
            <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('large');
                } else {
                    echo '<img src="' . get_template_directory_uri() . '../images/aeroport.jpg" alt="Image par défaut">';
                }
            ?>  
            <h2><?php the_title(); ?></h2>
            <div><?php the_content(); ?>
                <?php the_category(); ?>
                <?php $tableau = get_the_category(); ?>
                <p>Température Maximum: <?php the_field("temperature_maximum"); ?>°C</p>
                <p>Température Minimum: <?php the_field("temperature_minimum"); ?>°C</p>
                <p>Température Moyenne: <?php the_field("temperature_moyenne"); ?>°C</p>
                <p>Nom de l'auteur: <?php the_field("nom_de_lauteur"); ?></p>
                <p>Date de publication: <?php the_field("date_de_publication"); ?></p>
                <p>Prix: <?php the_field("prix_voyage"); ?>$</p>
            </div>
        </article>
        <?php endwhile; endif; ?>
    </div>
</section>
<?php get_footer(); ?>
</body>
</html>

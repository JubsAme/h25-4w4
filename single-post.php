<?php get_header(); ?>  <!-- Inclusion de l'en-tête du thème -->

<section class="populaire">
    <div class="global">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>  <!-- Boucle WordPress pour parcourir les articles -->

        <article>
            <?php
                // Affiche l'image mise en avant si elle existe, sinon affiche une image par défaut
                if (has_post_thumbnail()) {
                    the_post_thumbnail('large');
                } else {
                    echo '<img src="' . get_template_directory_uri() . '../images/aeroport.jpg" alt="Image par défaut">';
                }
            ?>  

            <h2><?php the_title(); ?></h2>  <!-- Affiche le titre de l'article -->

            <div>
                <?php the_content(); ?>  <!-- Affiche le contenu principal de l'article -->

                <?php echo categorie_par_destination(); ?>  <!-- Affiche la liste des catégories (boutons) via fonction personnalisée -->

                <!-- Affichage des champs personnalisés ACF (Advanced Custom Fields) -->
                <p>Température Maximum: <?php the_field("temperature_maximum"); ?>°C</p>
                <p>Température Minimum: <?php the_field("temperature_minimum"); ?>°C</p>
                <p>Température Moyenne: <?php the_field("temperature_moyenne"); ?>°C</p>
                <p>Nom de l'auteur: <?php the_field("nom_de_lauteur"); ?></p>
                <p>Date de publication: <?php the_field("date_de_publication"); ?></p>
                <p>Prix: <?php the_field("prix_voyage"); ?>$</p>
            </div>
        </article>

        <?php endwhile; endif; ?>  <!-- Fin de la boucle WordPress -->
    </div>
</section>

<?php get_footer(); ?>  <!-- Inclusion du pied de page du thème -->

</body>
</html>

<?php
/*
Template Name: Événement
*/
get_header(); // Appelle l'en-tête du site (header.php)
?>

<section class="populaire">
    <div class="global">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <h2><?php the_title(); ?></h2> <!-- Affiche le titre de la page -->
                <div><?php the_content() ?> <!-- Affiche le contenu principal de la page -->
        <?php endwhile; endif; ?>

        <p>Date de l'événement :
        <?php the_field('date_evenement'); // Affiche la date personnalisée de l'événement depuis ACF ?></p>

        <p>Lieu : <?php the_field('lieu_evenement'); // Affiche le lieu de l'événement depuis ACF ?></p>

        <div>
            <?php the_field('description_evenement'); // Affiche la description de l'événement depuis ACF ?>

            <section class="destination">
                <?php categories_liste("destination") // Affiche une liste de catégories avec le paramètre "destination" ?>
                <h2 class="destination__titre">Articles de la catégorie</h2>
                <div class="destination__list"></div> <!-- Zone où les articles liés à la catégorie peuvent s'afficher dynamiquement -->
            </section>
        </div>
    </div>
</section>

<div class="evenement">
    <!-- Section vide pouvant être utilisée pour du contenu supplémentaire -->
</div>

<?php get_footer(); // Appelle le pied de page du site (footer.php) ?>

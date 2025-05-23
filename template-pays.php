<?php
/*
Template Name: Pays
*/
get_header(); // Appelle l'en-tête du site (header.php)
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article>
        <h2><?php the_title(); ?></h2> <!-- Affiche le titre de la page -->
        <div>
            <?php the_content(); ?> <!-- Affiche le contenu principal de la page -->
        </div>
        <?php genere_vagues_pays(); ?> <!-- Appelle la fonction personnalisée -->
    </article>
<?php endwhile; endif; ?>

<?php get_footer(); // Appelle le pied de page du site (footer.php) ?>

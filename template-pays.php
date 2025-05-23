<?php
/*
Template Name: Pays
*/
get_header(); // Appelle l'en-tête du site (header.php)
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article>
        <h2 class="pays__nom"><?php the_title(); ?></h2> <!-- Affiche le titre de la page -->
        <div class = "pays__intro">
            <?php the_content(); ?> <!-- Affiche le contenu principal de la page -->
        </div>
        <?php genere_vagues_pays(); ?> <!-- Appelle la fonction personnalisée -->
    </article>
<?php endwhile; endif; ?>

<!-- Section des destinations avec liste des pays et titre -->
<section class="destination">

  <!-- Conteneur où le script JS injectera les boutons des pays -->
  <div class="pays__container"></div>

  <h2 class="destination__titre">Articles liés au pays sélectionné</h2>

  <!-- Conteneur où s’afficheront les destinations chargées dynamiquement -->
  <div class="destination__list"></div>

</section>


<?php get_footer(); // Appelle le pied de page du site (footer.php) ?>

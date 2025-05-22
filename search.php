<?php
/**
 * Modèle pour afficher les résultats de recherche
 */
get_header();
?>
<main class="site__main">
    <section class="recherche__section">

        <!-- Vérifie s'il y a des résultats de recherche -->
        <?php if (have_posts()) : ?>

            <!-- Affiche le nombre total d'articles trouvés -->
            <p><strong><?php echo count($wp_query->posts); ?></strong> article(s)</p>

            <!-- Boucle sur chaque article trouvé -->
            <?php while (have_posts()) : the_post(); ?>

                <article>
                    <!-- Titre de l'article avec lien vers l'article complet -->
                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

                    <!-- Extrait limité à 60 mots -->
                    <p><?php echo wp_trim_words(get_the_excerpt(), 60); ?></p>
                    <hr>
                </article>

            <?php endwhile; ?>

        <!-- Message affiché si aucun résultat n'est trouvé -->
        <?php else : ?>
            <p>Aucun résultat trouvé.</p>
        <?php endif; ?>

    </section>
</main>
<?php get_footer(); ?>

<?php get_header(); ?>

<!-- Section principale pour afficher les posts populaires -->
<section class="populaire">
    <div class="global">

        <!-- Boucle WordPress pour vérifier s’il y a des posts -->
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article>
            <!-- Affiche le titre de l’article -->
            <h2><?php the_title(); ?></h2>

            <!-- Affiche le contenu complet de l’article -->
            <div><?php the_content() ?></div>
        </article>

        <!-- Fin de la boucle -->
        <?php endwhile; endif; ?>

    </div>
</section>

<?php get_footer(); ?>

</body>
</html>

<?php get_header(); ?>

<!-- Titre de la catégorie actuelle -->
<h1 class="titre_cat"><?php single_cat_title(); ?></h1>

<!-- Description de la catégorie actuelle -->
<p><?php echo category_description(); ?></p>

<!-- Section affichant les articles populaires -->
<section class="populaire">
    <div class="global">
        <!-- Boucle WordPress pour afficher les articles -->
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <!-- Inclusion du template part pour afficher une carte/article -->
            <?php get_template_part('gabarits/carte'); ?>
        <?php endwhile; endif; ?>
    </div>
</section>

<?php get_footer(); ?>

</body>
</html>

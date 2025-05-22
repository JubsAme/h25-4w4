<?php get_header(); ?>

<!-- Inclusion de la partie Hero (bannière ou section d’intro) -->
<?php get_template_part( 'gabarits/contenuhero' ); ?> 

<!-- Section principale affichant les articles populaires -->
<section class="populaire">
    <div class="global">
        <?php if (have_posts()) : while (have_posts()) : the_post(); 
            // Si l'article est dans la catégorie "galerie", on affiche son contenu complet
            if (in_category("galerie"))  {
                the_content();
            } else {    
                // Sinon, on charge un template partiel appelé 'carte' (extrait ou présentation personnalisée)
                get_template_part( 'gabarits/carte' ); 
            } 
        endwhile; endif; ?>
    </div>
</section>

<!-- Section des destinations avec liste des catégories et titre -->
<section class="destination">
    <?php categories_liste("destination") ?> <!-- Affiche la liste des catégories "destination" via une fonction personnalisée -->
    <h2 class="destination__titre">Articles de la catégorie</h2>
    <div class="destination__list"></div> <!-- Conteneur vide probablement rempli via JS ou autre -->
</section>

<!-- Pied de page vide, peut-être pour un futur contenu -->
<footer></footer>

<?php get_footer(); ?>
</body>
</html>

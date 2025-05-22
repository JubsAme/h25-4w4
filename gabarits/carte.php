<article class="carte carte--grande">
  <figure class="carte__image">
    <?php
      // Affiche l'image mise en avant (thumbnail) de l'article au format 'large'
      if (has_post_thumbnail()) {
          the_post_thumbnail('large'); 
      } 
    ?> 
  </figure>

  <div class="carte__conteneurTitre">
    <!-- Titre de l'article -->
    <h4 class="carte__titre"><?php the_title(); ?></h4>
  </div>

  <div class="carte__contenu">
    <!-- Extrait du contenu limité à 10 mots, suivi de " ..." -->
    <p class="carte__description"><?php echo wp_trim_words(get_the_content(), 10, " ... "); ?></p>

    <!-- Affiche les catégories sous forme de boutons, en excluant la catégorie 'populaire' -->
    <?php echo categorie_par_destination('populaire'); ?> 

    <!-- Champs personnalisés ACF affichant les températures -->
    <p>Température Maximum: <?php the_field("temperature_maximum"); ?>°C</p>
    <p>Température Minimum: <?php the_field("temperature_minimum"); ?>°C</p>
    <p>Température Moyenne: <?php the_field("temperature_moyenne"); ?>°C</p>

    <!-- Champ personnalisé ACF affichant le prix du voyage -->
    <p class="Prix">Prix: <?php the_field("prix_voyage"); ?>$</p>

    <!-- Lien vers l'article complet -->
    <a class="carte__bouton carte__bouton--actif" href="<?php the_permalink() ?>">suite ...</a>
  </div>
</article>

<article class="carte carte--grande">
  <figure class="carte__image">
  <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail('large'); 
        } 
  ?> 
  </figure>
  <div class="carte__conteneurTitre">
    <h4 class="carte__titre"><?php the_title(); ?></h4>
  </div>
  <div class="carte__contenu">
    <p class="carte__description"><?php echo wp_trim_words(get_the_content(),10, " ... " ); ?></p>

    <?php
        $categories = get_the_category();

    if (!empty($categories)) {
        $slug = $categories[0]->slug;
        $cat_a_afficher = categorie_par_destination($slug);

        if ($cat_a_afficher) {
            echo '<a href="#" class="btn-categorie">Catégorie : ' . esc_html($cat_a_afficher) . '</a>';
        }
      }
    ?>

    <p>Température Maximum: <?php the_field("temperature_maximum"); ?>°C</p>
    <p>Température Minimum: <?php the_field("temperature_minimum"); ?>°C</p>
    <p>Température Moyenne: <?php the_field("temperature_moyenne"); ?>°C</p>
    <p class="Prix">Prix: <?php the_field("prix_voyage"); ?>$</p>
    <a class="carte__bouton carte__bouton--actif" href="<?php the_permalink() ?>">suite ...</a>
  </div>
</article>

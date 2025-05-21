<?php
 /**
  * Génére une liste de sous-catégories
  * @param string $parent_slug Le slug de la catégorie parente
  */
 function categories_liste($parent_slug){
     
     //echo "categorie_liste";
     // Récupérer la catégorie parente à partir de son slug
     $parent_category = get_category_by_slug($parent_slug);
     // Vérifier si la catégorie parente existe
     if ($parent_category) {
         $parent_id = $parent_category->term_id;
         // Récupérer les sous-catégories de "destination"
         $sous_categories = get_categories(array(
             'parent' => $parent_id, // Filtrer par le parent "destination"
             'hide_empty' => true, // Ne pas afficher les catégories vides
     ));
 
         // Vérifier s'il y a des sous-catégories
         if (!empty($sous_categories)) {
             echo '<ul class="categorie__ul">';
         foreach ($sous_categories as $categorie) {
             // Afficher le nom de chaque sous-catégorie
             echo '<li  data-category_id="' . esc_html($categorie->term_id) . '" class="categorie__ul__li">' . esc_html($categorie->name) . '</li>';
         }
         echo '</ul>';
         }
     }
 }


 function genere_vague(){?>
   <svg style="top: 20px" class="vague" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,64L120,101.3C240,139,480,213,720,202.7C960,192,1200,96,1320,48L1440,0L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
 <?php }
 //Fonction pour afficher les réseaux sociaux avec leur lien

 function afficher_icones_reseaux_svg() {
    $socials = ['facebook', 'twitter', 'instagram', 'github'];

    echo '<div class="reseaux-sociaux-svg">';
    foreach ($socials as $reseau) {
        $icon = get_theme_mod("social_icon_$reseau");
        $link = get_theme_mod("social_link_$reseau");

        if ($icon && $link) {
            echo '<a href="' . esc_url($link) . '" target="_blank" rel="noopener noreferrer">';
            echo '<img src="' . esc_url($icon) . '" alt="' . esc_attr($reseau) . '" style="width:24px; height:24px;">';
            echo '</a>';
        }
    }
    echo '</div>';
}

//Fonction pour afficher les boutons dans les destinations
function afficher_bouton_categorie_par_destination() {
    $categories = get_the_category();

    if (!empty($categories)) {
        $slug = $categories[0]->slug;
        $cat_a_afficher = categorie_par_destination($slug); // ta fonction personnalisée

        if ($cat_a_afficher) {
            echo '<a href="#" class="btn-categorie">Catégorie : ' . esc_html($cat_a_afficher) . '</a>';
        }
    }
}


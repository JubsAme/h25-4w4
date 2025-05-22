<?php
/**
 * Génère une liste HTML <ul> des sous-catégories d'une catégorie parente donnée
 * @param string $parent_slug Le slug de la catégorie parente
 */
function categories_liste($parent_slug){
    // Récupérer la catégorie parente via son slug
    $parent_category = get_category_by_slug($parent_slug);

    // Vérifier que la catégorie parente existe
    if ($parent_category) {
        $parent_id = $parent_category->term_id;

        // Récupérer les sous-catégories qui ont ce parent
        $sous_categories = get_categories(array(
            'parent' => $parent_id,    // Filtrer par la catégorie parente
            'hide_empty' => true       // Ne pas afficher les catégories vides
        ));

        // S'il y a des sous-catégories, les afficher dans une liste <ul>
        if (!empty($sous_categories)) {
            echo '<ul class="categorie__ul">';
            foreach ($sous_categories as $categorie) {
                // Chaque sous-catégorie est un <li> avec un attribut data-category_id
                echo '<li data-category_id="' . esc_html($categorie->term_id) . '" class="categorie__ul__li">' 
                     . esc_html($categorie->name) . '</li>';
            }
            echo '</ul>';
        }
    }
}

/**
 * Génère un SVG d'onde (vague décorative)
 */
function genere_vague() { ?>
    <svg class="vague" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#0099ff" fill-opacity="1" 
            d="M0,64L120,101.3C240,139,480,213,720,202.7C960,192,1200,96,1320,48L1440,0L1440,320L1320,320
               C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z">
      </path>
    </svg>
<?php }

/**
 * Affiche les icônes des réseaux sociaux configurés dans le Customizer
 * Chaque réseau social affiche un lien vers son URL avec une image SVG ou PNG
 */
function afficher_icones_reseaux_svg() {
    // Liste des réseaux sociaux supportés
    $socials = ['facebook', 'twitter', 'instagram', 'github'];

    echo '<div class="reseaux-sociaux-svg">';
    foreach ($socials as $reseau) {
        // Récupérer l'URL de l'icône et du lien depuis les réglages du thème
        $icon = get_theme_mod("social_icon_$reseau");
        $link = get_theme_mod("social_link_$reseau");

        // Afficher le lien avec l'icône si disponibles
        if ($icon && $link) {
            echo '<a href="' . esc_url($link) . '" target="_blank" rel="noopener noreferrer">';
            echo '<img src="' . esc_url($icon) . '" alt="' . esc_attr($reseau) . '" style="width:24px; height:24px;">';
            echo '</a>';
        }
    }
    echo '</div>';
}
?>

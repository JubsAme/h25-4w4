<?php
// Ajoute les fonctionnalités supportées par le thème
function mon_theme_supports() {
  add_theme_support('title-tag');       // Support des balises <title> automatiques
  add_theme_support('menus');            // Support des menus WordPress
  add_theme_support('post-thumbnails');  // Support des images à la une (featured images)

  // Taille personnalisée pour logo
  add_image_size('logo', 75, 75, true);

  // Support pour un logo personnalisé avec dimensions flexibles
  add_theme_support('custom-logo', array(
    'height'      => 50,
    'width'       => 50,
    'flex-height' => true,
    'flex-width'  => true,
  ));
}
add_action('after_setup_theme', 'mon_theme_supports');


// Enqueue des styles et scripts JS du thème
function theme_4w4_enqueue_styles() { 
  // Normalize.css pour réinitialiser les styles par défaut du navigateur
  wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css');

  // Feuille de style principale du thème
  wp_enqueue_style('mon-style-style', get_stylesheet_uri());

  // Script JavaScript pour les destinations (REST API)
  wp_enqueue_script(
    'destination_restapi',
    get_template_directory_uri() . '/js/destination.js',
    array(),
    filemtime(get_template_directory() . '/js/destination.js'), // cache-busting selon la date de modification
    true
  );

  // Script JavaScript pour le carrousel
  wp_enqueue_script(
    'carrousel',
    get_template_directory_uri() . '/js/carrousel.js',
    array(),
    filemtime(get_template_directory() . '/js/carrousel.js'), // cache-busting
    true
  );
}
add_action('wp_enqueue_scripts', 'theme_4w4_enqueue_styles');


/**
 * Modifie la requête principale avant son exécution
 * On filtre la requête de la page d'accueil pour afficher uniquement la catégorie "populaire"
 * Tri alphabétique des articles par titre croissant
 *
 * @param WP_Query $query La requête principale de WordPress
 */
function modifie_requete_principal($query) {
  if ($query->is_home() && $query->is_main_query() && !is_admin()) {
    $query->set('category_name', 'populaire');
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
  }
}
add_action('pre_get_posts', 'modifie_requete_principal');


/**
 * Retourne une liste de boutons correspondant aux catégories de l'article courant,
 * sauf la catégorie à retirer si elle est précisée
 *
 * @param string|null $cat_a_retirer Slug de la catégorie à exclure (ex: 'populaire')
 * @return string HTML des liens vers les catégories
 */
function categorie_par_destination($cat_a_retirer = null) {
  $categories = get_the_category(); // Récupère les catégories de l'article courant
  $output = '';

  if (!empty($categories)) {
    foreach ($categories as $cat) {
      // Ignore la catégorie à retirer si précisée
      if ($cat_a_retirer && $cat->slug === $cat_a_retirer) {
        continue;
      }

      // Crée un lien vers la page de la catégorie
      $link = get_category_link($cat->term_id);
      $name = esc_html($cat->name);

      $output .= '<a href="' . esc_url($link) . '" class="btn-categorie">' . $name . '</a> ';
    }
  }

  // Ne rien retourner si aucune catégorie ne correspond
  if (empty($output)) {
    return '';
  }

  return $output;
}
?>

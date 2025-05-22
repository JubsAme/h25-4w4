<?php 
// Récupération des paramètres personnalisés du Customizer pour la page 404
$ExamenIntra404_background = get_theme_mod('ExamenIntra404_background', '');
$titre_404 = get_theme_mod('titre_404', '');
$texte_404 = get_theme_mod('texte_404', '');
$bouton_404 = get_theme_mod('bouton_404', '');
$couleur_404 = get_theme_mod('couleur_404', '');
?>

<?php get_header(); ?>

<!-- Section principale de la page 404 avec style dynamique -->
<section class="section_404" style="background-image: url(<?php echo $ExamenIntra404_background ?>); color: <?php echo $couleur_404 ?>">
  
  <!-- Titre principal personnalisé -->
  <h1 class="section_404__titre">
    <?php echo $titre_404 ?>
  </h1>

  <!-- Texte descriptif personnalisé -->
  <p class="section_404__texte">
    <?php echo $texte_404 ?>
  </p>

  <!-- Bouton de retour à l'accueil -->
  <a href="<?php echo home_url(); ?>" class="section_404__boutonAccueil">
    <?php echo $bouton_404 ?>
  </a>

  <!-- Menu personnalisé spécifique à la page 404 -->
  <?php wp_nav_menu(array(
    'menu' => '404ExamIntra',
    'container' => 'nav',
    'container_class' => 'section_404__nav'
  )); ?>

  <!-- Formulaire de recherche WordPress -->
  <div class="section_404__search">
    <?php get_search_form(); ?>
  </div>

</section>

<?php get_footer(); ?>

</body>
</html>

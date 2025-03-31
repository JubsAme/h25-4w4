<?php $ExamenIntra404_background = get_theme_mod('ExamenIntra404_background', '');?>
<?php $titre_404 = get_theme_mod('titre_404', '');?>
<?php $texte_404 = get_theme_mod('texte_404', '');?>
<?php $bouton_404 = get_theme_mod('bouton_404', '');?>
<?php $couleur_404 = get_theme_mod('couleur_404', '');?>

<?php get_header(); ?>
  <section class="section_404" style="background-image: url(<?php echo $ExamenIntra404_background?>);color:<?php echo $couleur_404?>">
    <h1 class="section_404__titre">
    <?php echo $titre_404?>
    </h1>
    <p class="section_404__texte">
    <?php echo $texte_404?>
    
    </p>
    <a href="<?php echo home_url(); ?>" class="section_404__boutonAccueil">
    <?php echo $bouton_404?>
    </a>
    <?php wp_nav_menu(array(
                    'menu' => '404ExamIntra',
                    'container' => 'nav',
                    'container_class' => 'section_404__nav'
                )); ?>
  </section>
<?php get_footer(); ?>
   
</body>
</html>
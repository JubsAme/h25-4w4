<?php $ExamenIntra404_background = get_theme_mod('ExamenIntra404_background', '');?>
<?php get_header(); ?>
  <section class="section_404" style="background-image: url(<?php echo $ExamenIntra404_background?>);">
    <h1 class="section_404__titre">
    Oops, vous avez échoué sur l'île 404 !
    </h1>
    <p class="section_404__texte">
    Pas de panique, cher membre explorateur ! Vous avez dérivé un peu trop loin des destinations de rêve que notre club a soigneusement sélectionnées pour vous. Reprenez votre périple en cliquant sur 'Accueil' pour découvrir à nouveau nos voyages d’exception !
    </p>
    <a href="<?php echo home_url(); ?>" class="btn-home">Lien Customizer</a>
    <div class="section_404__menu"></div>
    <?php wp_nav_menu(array(
                    'menu' => '404ExamIntra',
                    'container' => 'a',
                    'container_class' => 'section_404__menu'
                )); ?>
  </section>
<?php get_footer(); ?>
   
</body>
</html>
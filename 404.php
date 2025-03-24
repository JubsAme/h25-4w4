<?php $erreur_background = get_theme_mod('erreur_background', '');?>
<?php echo($erreur_background)?>
<?php get_header(); ?>
<section class="error404" style="background-image: url(<?php echo $erreur_background?>);">

  <h1 class="H1Erreur404">Erreur 404 Cette page n'a pas été trouvée!</h1>
  <h2 class="H2Erreur404">Entrez un lien valide ou revenez en arrière!</h2>
</section>
    <?php get_footer(); ?>
   
</body>
</html>
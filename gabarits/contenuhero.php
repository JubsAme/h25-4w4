<?php 
// Récupération des variables personnalisées du Customizer WordPress
$hero_auteur = get_theme_mod('hero_auteur', ''); 

// Tableau des images de fond pour les 3 slides du carrousel
for ($k=0; $k<3; $k++){
  $hero_background[$k] = get_theme_mod('hero_background_'.$k, '');
}

$hero_courriel = get_theme_mod('hero_courriel', '');
$hero_couleur = get_theme_mod('hero_couleur', '');
$hero_telephone = get_theme_mod('hero_telephone', '');
?>

<section class="hero">

  <div class="hero__radio">
    <!-- Inputs radio pour contrôler manuellement le carrousel -->
    <input type="radio" name="carroussel" id="radio0" class="hero__radio__input" checked>
    <input type="radio" name="carroussel" id="radio1" class="hero__radio__input">
    <input type="radio" name="carroussel" id="radio2" class="hero__radio__input">

    <!-- Slides du carrousel avec images de fond dynamiques -->
    <div class="hero__carrousel" id="carrousel0" style="background-image: url(<?= $hero_background[0] ?>);"></div>
    <div class="hero__carrousel" id="carrousel1" style="background-image: url(<?= $hero_background[1] ?>);"></div>
    <div class="hero__carrousel" id="carrousel2" style="background-image: url(<?= $hero_background[2] ?>);"></div>

    <!-- Labels cliquables pour changer la slide active -->
    <div class="hero__radio__labels">
      <label for="radio0">1</label>
      <label for="radio1">2</label>
      <label for="radio2">3</label>
    </div>
  </div>

  <!-- Contenu superposé au carrousel -->
  <div class="hero__contenu global">
    <!-- Titre du site dynamique -->
    <h1 class="hero__titre"><?php bloginfo("name"); ?></h1>

    <!-- Description du site dynamique -->
    <p class="hero__description">
      <?php bloginfo("description"); ?>
    </p>

    <!-- Courriel affiché depuis le Customizer -->
    <p class="hero__courriel">
      <a href="#"><?php echo $hero_courriel ?></a>
    </p>

    <!-- Adresse statique -->
    <p class="hero__adresse">
      5800 Sherbrooke-est - Montréal (Québec) H1X 2A2
    </p>

    <!-- Auteur dynamique -->
    <p class="hero_auteur">Auteur: <?php echo $hero_auteur; ?></p>

    <!-- Téléphone dynamique -->
    <p class="hero_telephone">Numéro de téléphone: <?php echo $hero_telephone; ?></p>

    <!-- Affichage des icônes réseaux sociaux via fonction personnalisée -->
    <div class="hero__icone">
      <?php afficher_icones_reseaux_svg(); ?>
    </div>

    <!-- Formulaire d'inscription simple -->
    <div class="hero_inscription">
      <table class="hero_tableau">
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Âge</th>
          <th>Courriel</th>
        </tr>
        <tr>
          <td class="hero_tableau_td" data-label="Nom"><input type="text" placeholder="..."></td>
          <td class="hero_tableau_td" data-label="Prénom"><input type="text" placeholder="..."></td>
          <td class="hero_tableau_td" data-label="Âge"><input type="text" placeholder="..."></td>
          <td class="hero_tableau_td" data-label="Courriel"><input type="text" placeholder="..."></td>
          <td><input type="button" value="S'inscrire"></td>
        </tr>
      </table>
    </div>
  </div>
</section>

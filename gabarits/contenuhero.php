<?php $hero_auteur = get_theme_mod('hero_auteur', '');?>
<?php 
for ($k=0;$k<3;$k++){
$hero_background[$k] = get_theme_mod('hero_background_'.$k, '');
}
?>
<?php $hero_courriel = get_theme_mod('hero_courriel', '');?>
<?php $hero_couleur = get_theme_mod('hero_couleur', '');?>
<?php $hero_telephone = get_theme_mod('hero_telephone', '');?>



    <section class="hero">

      <div class="hero__radio">
        <!-- Inputs radio -->
        <input type="radio" name="carroussel" id="radio0" class="hero__radio__input" checked>
        <input type="radio" name="carroussel" id="radio1" class="hero__radio__input">
        <input type="radio" name="carroussel" id="radio2" class="hero__radio__input">

        <!-- Carrousels : 1er, 2e, 3e -->
        <div class="hero__carrousel" id="carrousel0" style="background-image: url(<?= $hero_background[0] ?>);"></div>
        <div class="hero__carrousel" id="carrousel1" style="background-image: url(<?= $hero_background[1] ?>);"></div>
        <div class="hero__carrousel" id="carrousel2" style="background-image: url(<?= $hero_background[2] ?>);"></div>

        <!-- Labels visibles -->
        <div class="hero__radio__labels">
            <label for="radio0">1</label>
            <label for="radio1">2</label>
            <label for="radio2">3</label>
        </div>
        </div>

        
        <div class="hero__contenu global">
            <h1 class="hero__titre"><?php bloginfo("name"); ?></h1>
            <p class="hero__description">
            <?php bloginfo("description"); ?>
            </p>
            <p class="hero__courriel">
                <a href="#"><?php echo $hero_courriel?></a>
            </p>
            <p class="hero__adresse">
                5800 Sherbrooke-est - Montréal (Québec) H1X 2A2
            </p>
            <p class ="hero_auteur">Auteur: <?php echo $hero_auteur; ?></p>
            <p class ="hero_telephone">Numéro de téléphone: <?php echo $hero_telephone; ?></p>

            <div class="hero__icone">
            <?php afficher_icones_reseaux_svg(); ?>
            </div>
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

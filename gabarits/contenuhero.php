<?php $hero_auteur = get_theme_mod('hero_auteur', '');?>
    <?php $hero_background = get_theme_mod('hero_background', '');?>
    <?php $hero_courriel = get_theme_mod('hero_courriel', '');?>
    <?php $hero_couleur = get_theme_mod('hero_couleur', '');?>


    <section class="hero" style = "background-image: url(<?php echo $hero_background?>);color:<?php echo $hero_couleur?>">
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
            <div class="hero__icone">
            <?php get_template_part( 'gabarits/icones' ); ?>
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
                        <th><input type="text" placeholder="..."></th>
                        <th><input type="text" placeholder="..."></th>
                        <th><input type="text" placeholder="..."></th>
                        <th><input type="text" placeholder="..."></th>
                        <th><input type="button" value ="S'inscrire"></th>
                    </tr>
                </table>
            </div>
        </div>
    </section>

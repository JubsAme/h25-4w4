<?php $footer_couleurIcones = get_theme_mod('footer_couleurIcones', '');?>
<?php $footer_mission = get_theme_mod('footer_mission', '');?>
<?php $footer_adresse = get_theme_mod('footer_adresse', '');?>
<?php $footer_telephone = get_theme_mod('footer_telephone', '');?>
<?php $footer_courriel = get_theme_mod('footer_courriel', '');?>
<?php $footer_background = get_theme_mod('footer_background', '');?>


<?php
genere_vague();
?>

<footer>
    <div class="piedpage global">
        <section class="piedpage__s1">
            <div class="piedpage__s1__externe">
                <?php wp_nav_menu(array(
                    "menu" => "externe",
                    "container" => "nav",
                )); ?>
                    <?php wp_nav_menu(array(
                    "menu" => "principal",
                    "container" => "nav",
                )); ?>
            </div>
            <div class="piedpage__s1__adresse">
                <div class="piedpage__s1__adresse__coord">
                    <h2>Trouvez nos informations et rejoignez-nous sur nos réseaux sociaux!</h2>
            <!---Ici mettre des variables controlables avec les Customizer-->
                    <?php afficher_icones_reseaux_svg();?>
                    
                </div>
                <div class="piedpage__s1__adresse__recherche">
                    <h2>Nous Contacter</h2>
                    <h3 class="footerAdresse">
                    <p>Notre adresse: <?php echo $footer_adresse ?></p>
                    <p>Notre numéro de téléphone: <?php echo $footer_telephone ?></p>
                    <p>Notre email: <?php echo $footer_courriel ?></p>

                    </h3>
                    <?php get_search_form();   ?>
                </div>
            </div>
            <div class="piedpage__s1__description">
                <h2>Notre mission</h2>
            <?php echo $footer_mission ?>
            <section class="piedpage__s1__image" style="background-image: url(<?php echo $footer_background?>)">
            </section>
            </div>
            
        </section>
    </div>
</footer>
<?php wp_footer() ?>
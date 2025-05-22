<?php
// Récupération des valeurs personnalisées depuis le Customizer WordPress
$footer_couleurIcones = get_theme_mod('footer_couleurIcones', '');
$footer_mission = get_theme_mod('footer_mission', '');
$footer_adresse = get_theme_mod('footer_adresse', '');
$footer_telephone = get_theme_mod('footer_telephone', '');
$footer_courriel = get_theme_mod('footer_courriel', '');
$footer_background = get_theme_mod('footer_background', '');

// Fonction personnalisée qui génère une vague décorative
genere_vague();
?>

<footer>
    <div class="piedpage global">
        <section class="piedpage__s1">

            <!-- Navigation externe et principale affichée dans le footer -->
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

            <!-- Section contact et réseaux sociaux -->
            <div class="piedpage__s1__adresse">
                <div class="piedpage__s1__adresse__coord">
                    <h2>Trouvez nos informations et rejoignez-nous sur nos réseaux sociaux!</h2>
                    <!-- Affichage des icônes réseaux sociaux, fonction personnalisée -->
                    <?php afficher_icones_reseaux_svg(); ?>
                </div>

                <div class="piedpage__s1__adresse__recherche">
                    <h2>Nous Contacter</h2>
                    <h3 class="footerAdresse">
                        <!-- Affichage des coordonnées depuis le Customizer -->
                        <p>Notre adresse: <?php echo $footer_adresse ?></p>
                        <p>Notre numéro de téléphone: <?php echo $footer_telephone ?></p>
                        <p>Notre email: <?php echo $footer_courriel ?></p>
                    </h3>
                    <!-- Formulaire de recherche WordPress -->
                    <?php get_search_form(); ?>
                </div>
            </div>

            <!-- Description de la mission et image de fond -->
            <div class="piedpage__s1__description">
                <h2>Notre mission</h2>
                <?php echo $footer_mission ?>
                <!-- Image de fond configurée via le Customizer -->
                <section class="piedpage__s1__image" style="background-image: url(<?php echo $footer_background ?>)">
                </section>
            </div>

        </section>
    </div>
</footer>

<?php wp_footer() ?>

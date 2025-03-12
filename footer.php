<?php $footer_couleurIcones = get_theme_mod('footer_couleurIcones', '');?>
<footer>
    <div class="piedpage global">
        <section class="piedpage__s1">
            <div class="piedpage__s1__externe">
                <?php wp_nav_menu(array(
                    "menu" => "externe",
                    "container" => "nav",
                )); ?>
            </div>
            <div class="piedpage__s1__adresse">
                <div class="piedpage__s1__adresse__coord">
                    Trouvez nos informations et rejoignez-nous sur nos réseaux sociaux!
            <!---Ici mettre des variables controlables avec les Customizer-->
                    <img src="https://s2.svgbox.net/social.svg?ic=facebook&color=<?php echo $footer_couleurIcones ?>" width="20" height="20">
                    <img src="https://s2.svgbox.net/social.svg?ic=linkedin&color=<?php echo $footer_couleurIcones ?>" width="20" height="20">
                    <img src="https://s2.svgbox.net/social.svg?ic=stackoverflow&color=<?php echo $footer_couleurIcones ?>" width="20" height="20">
                    <img src="https://s2.svgbox.net/social.svg?ic=snapchat&color=<?php echo $footer_couleurIcones ?>" width="20" height="20">
                </div>
                <div class="piedpage__s1__adresse__recherche">
                    <h3 class="footerAdresse">
                        3800 rue Sherbrooke Est.
                    </h3>
                    <?php get_search_form();   ?>
                </div>
            </div>
            <div class="piedpage__s1__description">
                Chez Jubs Airways notre mission est de vous offrir des plans de voyages affordables accompagné par l'expertise de nos employés pour vous offrir des vacances de rêve!
            </div>
        </section>
        <section class="piedpage__s2">

        </section>
        <section class="piedpage__s3">

        </section>


    </div>
</footer>
<?php wp_footer() ?>
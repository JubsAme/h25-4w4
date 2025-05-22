<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Métadonnées et configuration de la page -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Préconnexion aux serveurs Google Fonts pour optimiser le chargement -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Importation de la police Roboto Slab -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    
    <!-- Titre du site -->
    <title>Jubs Airways</title>
    
    <!-- Fonction WordPress pour insérer les scripts, styles et autres éléments dans le head -->
    <?php wp_head() ?>
</head>
<body>

    <!-- En-tête principal contenant logo, menu et recherche -->
    <header>
        <div class="entete">

            <!-- Logo personnalisé défini via le Customizer WordPress -->
            <figure class="entete__logo">
                <?php
                if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                }
                ?>
            </figure>

            <!-- Checkbox cachée qui sert de déclencheur pour le menu burger -->
            <input type="checkbox" id="burger-toggle" class="burger-toggle">
            
            <!-- Label stylisé en icône burger, relié à la checkbox -->
            <label for="burger-toggle" class="burger-icon">
                <span class="burger-bar"></span>
                <span class="burger-bar"></span>
                <span class="burger-bar"></span>
            </label>

            <!-- Conteneur de la navigation principale et du formulaire de recherche -->
            <div class="entete__navigation">
                <?php wp_nav_menu(array(
                    'menu' => 'principal',           // Nom du menu défini dans WordPress
                    'container' => 'nav',            // Balise conteneur <nav>
                    'container_class' => 'entete__menu' // Classe CSS pour styliser la nav
                )); ?>

                <!-- Formulaire de recherche WordPress -->
                <?php get_search_form() ?>
            </div> <!-- fin entete__navigation -->

        </div>
    </header>

</body>
</html>

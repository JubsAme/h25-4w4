<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <title>Jubs Airways</title>
    <?php wp_head() ?>
</head>
<body>
    <header>
        <div class="entete">
            <figure class="entete__logo">
            <?php
            if (function_exists('the_custom_logo')) {
                the_custom_logo();
            }
            ?>
            </figure>

            <!-- Burger menu -->
            <input type="checkbox" id="burger-toggle" class="burger-toggle">
            <label for="burger-toggle" class="burger-icon">
                <span class="burger-bar"></span>
                <span class="burger-bar"></span>
                <span class="burger-bar"></span>
            </label>

            <div class="entete__navigation">
                <?php wp_nav_menu(array(
                    'menu' => 'principal',
                    'container' => 'nav',
                    'container_class' => 'entete__menu'
                )); ?>
                <?php get_search_form() ?>
            </div> <!-- fin entete__navigation  -->
        </div>
    </header>
</body>
</html>

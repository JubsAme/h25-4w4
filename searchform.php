<!-- Formulaire de recherche avec méthode GET vers la page d'accueil -->
<form class="recherche" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    
    <!-- Champ de recherche, affiche la recherche en cours si elle existe -->
    <input class="recherche__input" type="search" placeholder="Rechercher..." value="<?php echo get_search_query(); ?>" name="s" />
    
    <!-- Bouton pour soumettre la recherche avec icône loupe -->
    <button class="recherche__bouton" type="submit">
        
        <!-- Icône SVG de recherche -->
        <img class="recherche__img"  src="https://s2.svgbox.net/hero-outline.svg?ic=search&color=000" width="16" height="16">
    </button>
</form>

/**
 * Script JS pour extraire et afficher les destinations de voyage selon la catégorie choisie
 */
(function(){
  console.log("destination.js");

  let categoryId = 3; // catégorie par défaut
  const domaine = window.origin + "/monprojet/";

  // Initialisation : parcours des boutons et chargement initial
  parcourir_bouton();
  mon_fetch(categoryId);

  // Ajoute un écouteur d'événement sur chaque bouton de catégorie
  function parcourir_bouton(){
    const categorie__ul__li = document.querySelectorAll(".categorie__ul__li");
    console.log("categorie__ul__li.length = ", categorie__ul__li.length);
    
    categorie__ul__li.forEach(elm => {
      elm.addEventListener('mousedown', function(){
        const selectedId = elm.dataset.category_id;
        console.log("elm.dataset.category_id = ", selectedId);
        mon_fetch(selectedId);
      });
    });
  }

  // Fonction pour récupérer les articles d'une catégorie via l'API WP REST
  function mon_fetch(categoryId) {
    const apiUrl = `${domaine}wp-json/wp/v2/posts?categories=${categoryId}`;
    const destinationList = document.querySelector('.destination__list');

    // Fermer l'accordéon avant de charger les nouvelles données
    destinationList.classList.remove('open');

    // Forcer un reflow pour que le retrait de la classe soit pris en compte
    void destinationList.offsetHeight;

    // Appel API avec fetch
    fetch(apiUrl)
      .then(response => response.json()) // Convertit la réponse en JSON
      .then(data => {
        // Vide le contenu avant d'ajouter les nouvelles destinations
        destinationList.innerHTML = "";

        if (data.length === 0) {
          destinationList.innerHTML = "<p>Aucune destination trouvée.</p>";
        } else {
          // Pour chaque article reçu, on crée un bloc HTML
          data.forEach(article => {
            const articleElement = document.createElement('div');
            articleElement.innerHTML = `
              <h3 class="titre_destination">${article.title.rendered}</h3>
              <p>${article.excerpt.rendered}</p>
              <a href="${article.link}" class="btn-lire-plus">Lire plus</a>
            `;
            destinationList.appendChild(articleElement);
          });
        }

        // Rouvrir l'accordéon pour déclencher l'animation d'ouverture
        setTimeout(() => {
          destinationList.classList.add('open');
        }, 50);
      })
      .catch(error => {
        console.error('Erreur lors de la récupération des articles:', error);
      });
  }
})();

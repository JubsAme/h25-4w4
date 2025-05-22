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
        // Affiche le tag et l'id de catégorie du bouton cliqué
        console.log(elm.tagName);
        console.log("elm.dataset.category_id = ", elm.dataset.category_id);
        // Lance la récupération des destinations de la catégorie sélectionnée
        mon_fetch(elm.dataset.category_id);
      });
    });
  }

  // Fonction pour récupérer les articles d'une catégorie via l'API WP REST
  function mon_fetch(categoryId) {
    const apiUrl = `${domaine}wp-json/wp/v2/posts?categories=${categoryId}`;
    const destinationList = document.querySelector('.destination__list');

    // Fermer l'accordéon avant de charger les nouvelles données
    destinationList.classList.remove('open');

    // Appel API avec fetch
    fetch(apiUrl)
      .then(response => response.json()) // Convertit la réponse en JSON
      .then(data => {
        // Vide le contenu avant d'ajouter les nouvelles destinations
        destinationList.innerHTML = "";
        if (data.length === 0) {
          // Message si aucune destination trouvée
          destinationList.innerHTML = "<p>Aucune destination trouvée.</p>";
          return;
        }
        // Pour chaque article reçu, on crée un bloc HTML
        data.forEach(article => {
          const articleElement = document.createElement('div');
          articleElement.innerHTML = `
            <h3 class="titre_destination">${article.title.rendered}</h3>
            <p>${article.excerpt.rendered}</p>
            <a href="${article.link}" class="btn-lire-plus">Lire plus</a>
          `;
          // Ajoute ce bloc dans la liste des destinations
          destinationList.appendChild(articleElement);
        });

        // Rouvrir l'accordéon pour déclencher l'animation d'ouverture
        setTimeout(() => {
          destinationList.classList.add('open');
        }, 10);
      })
      .catch(error => {
        // Affiche une erreur dans la console en cas de problème réseau ou autre
        console.error('Erreur lors de la récupération des articles:', error);
      });
  }
})();

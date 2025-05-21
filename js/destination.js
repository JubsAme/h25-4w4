/**
 * Script JS pour extraire et afficher les destinations de voyage selon la catégorie choisie
 */
(function(){
  console.log("destination.js");

  let categoryId = 3; // catégorie par défaut
  const domaine = window.origin + "/monprojet/";

  parcourir_bouton();
  mon_fetch(categoryId);

  function parcourir_bouton(){
    const categorie__ul__li = document.querySelectorAll(".categorie__ul__li");
    console.log("categorie__ul__li.length = ", categorie__ul__li.length);
    
    categorie__ul__li.forEach(elm => {
      elm.addEventListener('mousedown', function(){
        console.log(elm.tagName);
        console.log("elm.dataset.category_id = ", elm.dataset.category_id);
        mon_fetch(elm.dataset.category_id);
      });
    });
  }

  function mon_fetch(categoryId) {
    const apiUrl = `${domaine}wp-json/wp/v2/posts?categories=${categoryId}`;
    const destinationList = document.querySelector('.destination__list');

    // Fermer l'accordéon avant de charger
    destinationList.classList.remove('open');

    fetch(apiUrl)
      .then(response => response.json())
      .then(data => {
        destinationList.innerHTML = "";
        if (data.length === 0) {
          destinationList.innerHTML = "<p>Aucune destination trouvée.</p>";
          return;
        }
        data.forEach(article => {
          const articleElement = document.createElement('div');
          articleElement.innerHTML = `
            <h3 class="titre_destination">${article.title.rendered}</h3>
            <p>${article.excerpt.rendered}</p>
            <a href="${article.link}" class="btn-lire-plus">Lire plus</a>
          `;
          destinationList.appendChild(articleElement);
        });

        // Rouvrir l'accordéon pour déclencher l'animation
        setTimeout(() => {
          destinationList.classList.add('open');
        }, 10);
      })
      .catch(error => {
        console.error('Erreur lors de la récupération des articles:', error);
      });
  }
})();

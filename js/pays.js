(function(){
  console.log("destination.js chargé");

  // Liste des pays (pour menu)
  const pays = ["France", "États-Unis", "Canada", "Argentine", "Chili", "Belgique", "Maroc", "Mexique", "Japon", "Italie", "Islande", "Chine", "Grèce", "Suisse"];

  const domaine = window.origin + "/4w4_19/";

  const paysContainer = document.querySelector('.pays__container');
  const destinationList = document.querySelector('.destination__list');
  const titreDestination = document.querySelector('.destination__titre');

  // Mode API : "search" ou "categories"
  // Exemple : let modeApi = "search";
  let modeApi = "search"; 

  // Liste des catégories (nom => id) si besoin en mode categories
  // const categoriesMap = { "France": 3, "Canada": 5, ... }; // Exemple

  // Création des boutons pays
  function creerBoutonsPays() {
    pays.forEach(paysNom => {
      const btn = document.createElement('button');
      btn.textContent = paysNom;
      btn.classList.add('btn-pays');
      btn.dataset.pays = paysNom;
      paysContainer.appendChild(btn);
    });
  }

  // Fonction fetch générique selon mode API
  function fetchDestinations(pays) {
    let apiUrl;

    if (modeApi === "search") {
      // Requête avec paramètre search
      apiUrl = `${domaine}wp-json/wp/v2/posts?search=${encodeURIComponent(pays)}`;
    } else if (modeApi === "categories") {
      console.error("Mode categories non implémenté, car pas de map categories");
      return;
    }

    // Animation accordéon : fermeture
    destinationList.classList.remove('open');
    void destinationList.offsetHeight;

    fetch(apiUrl)
      .then(response => response.json())
      .then(data => {
        destinationList.innerHTML = "";

        if (!data.length) {
          destinationList.innerHTML = `<p>Aucune destination trouvée pour "${pays}".</p>`;
          titreDestination.textContent = `Articles pour "${pays}"`;
          ouvrirAccordeon();
          return;
        }

        titreDestination.textContent = `Articles pour "${pays}"`;

        data.forEach(article => {
          const articleEl = document.createElement('div');
          articleEl.classList.add('destination__article');
          articleEl.innerHTML = `
            <h3 class="titre_destination">${article.title.rendered}</h3>
            <div class="excerpt_destination">${article.excerpt.rendered}</div>
            <a href="${article.link}" class="btn-lire-plus" target="_blank" rel="noopener">Lire plus</a>
          `;
          destinationList.appendChild(articleEl);
        });

        ouvrirAccordeon();
      })
      .catch(err => {
        destinationList.innerHTML = `<p>Erreur lors du chargement des destinations.</p>`;
        console.error(err);
      });
  }

  // Animation accordéon : ouverture
  function ouvrirAccordeon() {
    setTimeout(() => {
      destinationList.classList.add('open');
    }, 50);
  }

  // Initialisation
  function init() {
    creerBoutonsPays();

    // Contenu par défaut : France
    fetchDestinations("France");

    // Ajout des écouteurs sur boutons
    paysContainer.querySelectorAll('.btn-pays').forEach(btn => {
      btn.addEventListener('click', () => {
        const paysChoisi = btn.dataset.pays;
        fetchDestinations(paysChoisi);
      });
    });
  }

  // Attendre le DOM ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();

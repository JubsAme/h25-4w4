(function(){
  console.log("destination.js chargé");

  const pays = ["France", "États-Unis", "Canada", "Argentine", "Chili", "Belgique", "Maroc", "Mexique", "Japon", "Italie", "Islande", "Chine", "Grèce", "Suisse"];

  const domaine = window.origin + "/4w4_19/"; // adapte selon ton domaine

  const paysContainer = document.querySelector('.pays__container');
  const destinationList = document.querySelector('.destination__list');
  const titreDestination = document.querySelector('.destination__titre');

  let modeApi = "search"; // "search" ou "categories" (ici on utilise "search")

  // Crée les boutons pays et les injecte dans .pays__container
  function creerBoutonsPays() {
    pays.forEach(paysNom => {
      const btn = document.createElement('button');
      btn.textContent = paysNom;
      btn.classList.add('btn-pays');
      btn.dataset.pays = paysNom;
      paysContainer.appendChild(btn);
    });
  }

  // Charge les destinations d’un pays via l’API REST WordPress
  function fetchDestinations(pays) {
    let apiUrl = `${domaine}wp-json/wp/v2/posts?search=${encodeURIComponent(pays)}`;

    destinationList.innerHTML = ""; // Reset contenu

    fetch(apiUrl)
      .then(response => response.json())
      .then(data => {
        if (!data.length) {
          destinationList.innerHTML = `<p>Aucune destination trouvée pour "${pays}".</p>`;
          titreDestination.textContent = `Articles pour "${pays}"`;
          return;
        }

        titreDestination.textContent = `Articles pour "${pays}"`;

        data.forEach(article => {
          // Génération d'un id unique pour l'input checkbox
          const checkboxId = `dest-${article.id}`;

          // Création du container article
          const articleEl = document.createElement('div');
          articleEl.classList.add('destination__article');

          // HTML accordéon checkbox + label + contenu
          articleEl.innerHTML = `
            <input type="checkbox" id="${checkboxId}" class="toggle-article" />
            <label for="${checkboxId}" class="titre_destination">${article.title.rendered}</label>
            <div class="content">
              <div class="excerpt_destination">${article.excerpt.rendered}</div>
              <a href="${article.link}" class="btn-lire-plus" target="_blank" rel="noopener">Lire plus</a>
            </div>
          `;

          destinationList.appendChild(articleEl);
        });
      })
      .catch(err => {
        destinationList.innerHTML = `<p>Erreur lors du chargement des destinations.</p>`;
        console.error(err);
      });
  }

  // Initialisation du script
  function init() {
    creerBoutonsPays();

    // Contenu par défaut : France
    fetchDestinations("canada");

    // Ajout écouteur sur chaque bouton pays
    paysContainer.querySelectorAll('.btn-pays').forEach(btn => {
      btn.addEventListener('click', () => {
        const paysChoisi = btn.dataset.pays;
        fetchDestinations(paysChoisi);
      });
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();

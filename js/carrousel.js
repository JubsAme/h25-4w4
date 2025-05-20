(function(){
  console.log("carrousel.js");

  const radios = document.querySelectorAll(".hero__radio__input");
  const contenu = document.querySelector(".hero__contenu");
  let currentIndex = 0;

  function montrerImage(index) {
    radios[index].checked = true;
    contenu.classList.remove("animate-text"); // reset animation
    void contenu.offsetWidth; // force reflow
    contenu.classList.add("animate-text");
  }

  // Changement automatique toutes les 5 secondes
  setInterval(() => {
    currentIndex = (currentIndex + 1) % radios.length;
    montrerImage(currentIndex);
  }, 5000);

  // Si l’utilisateur sélectionne une image manuellement
  radios.forEach((radio, i) => {
    radio.addEventListener("change", () => {
      currentIndex = i;
      montrerImage(currentIndex);
    });
  });
})();

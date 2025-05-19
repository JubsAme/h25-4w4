(function(){
  console.log("carrousel.js");
  let radios = document.querySelectorAll(".hero__radio__input");
  console.log("hero__radio__input = ", radios.length);

  let currentIndex = 0;

  function montrerImage(index) {
    radios[index].checked = true;
  }

  // change d’image toutes les 5s
  setInterval(() => {
    currentIndex = (currentIndex + 1) % radios.length;
    montrerImage(currentIndex);
  }, 5000);

  radios.forEach((radio, i) => {
    radio.addEventListener('change', () => {
      currentIndex = i; // update l’index actuel pour continuer à partir de là
    });
  });
})();

// JavaScript
$(document).ready(function () {
  // Code jQuery modifié
  $(".dropzoneContainer .hide").hide();

  $(".dropzoneContainer .dropzoneHeader, .containerUtilisateur h2").click(
    function () {
      // Trouver la div "hide" spécifique à ce dropzoneContainer et faire slideToggle
      $(this).siblings(".hide").slideToggle();
      // Récupérer le span contenu dans le h2
      var arrowSpan = $(this).find("span.arrow");

      // Vérifier s'il possède la classe "rotated"
      if (arrowSpan.hasClass("rotated")) {
        // Si oui, retirer la classe pour revenir à l'état initial
        arrowSpan.removeClass("rotated");
      } else {
        // Sinon, ajouter la classe pour pivoter le symbole de 90 degrés
        arrowSpan.addClass("rotated");
      }
    }
  );

  // Empêcher la propagation du clic lorsque vous cliquez sur l'image ou le formulaire à l'intérieur du conteneur
  $(".dropzoneContainer img, .dropzoneContainer form").click(function (event) {
    event.stopPropagation();
  });

  $(".editForm").hide();

  $(".editClasse").click(function () {
    $(this).siblings(".editForm").slideToggle();
  });
});

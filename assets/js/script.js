// JavaScript
$(document).ready(function () {
  // Cacher la div "hide" au chargement de la page
  $(".dropzoneContainer .hide").hide();

  // Ajouter un gestionnaire d'événements pour le clic sur le h2 de chaque dropzoneContainer
  $(".dropzoneContainer h2").click(function () {
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
  });
});

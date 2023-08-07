$(document).ready(function () {
  // Cacher la div "hide" au chargement de la page
  $(".dropzoneContainer .hide").hide();

  // Ajouter un gestionnaire d'événements pour le clic sur le h2 de chaque dropzoneContainer
  $(".dropzoneContainer h2").click(function () {
    // Trouver la div "hide" spécifique à ce dropzoneContainer et faire slideToggle
    $(this).siblings(".hide").slideToggle();
  });
});

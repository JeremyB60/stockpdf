<?php
session_start();

include_once "./php/connexionbdd.php";

try {
  // Requête SQL pour récupérer les noms de la table "classes"
  $sql = "SELECT nom FROM classes";
  $stmt = $connexion->query($sql);
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mathématiques - Bastien C.</title>
  <meta name="description" content="Bienvenue sur les cours de mathématiques de Bastien Courseaux. Découvrez des ressources pédagogiques pour les cours, les exercices, les devoirs et plus encore." />
  <link rel="icon" href="./assets/images/avatar.png" type="image/png">
  <link rel="stylesheet" href="./assets/css/style.css?v=4" />
</head>

<body>
  <div class="contenu">
    <header>
      <div class="avatar">
        <img src="./assets/images/avatar.png" alt="Avatar" class="avatarImg" />
        <div>
          <h1>Bastien Courseaux</h1>
          <p>Mes cours de&nbsp;mathématiques</p>
        </div>
        <?php
        if (isset($_SESSION['identifiant'])) { ?>
          <a href="./admin.php"><img src="./assets/icones/sync.svg" alt="connexion" class="log" /></a> <a href="./php/deconnexion.php"><img src="./assets/icones/logout.svg" alt="deconnexion" class="log2" title="Déconnexion" /></a> <?php
                                                                                                                                                                                                                                      } else { ?>
          <img src="./assets/icones/login.svg" alt="connexion" class="log" id="btnOpenModal" title="Connexion" /> <?php } ?>
        <!-- Le modal de connexion -->
        <?php include_once "./php/process_login.php"; ?>
        <div id="modal" class="modal">
          <div class="modal-content">
            <span class="close" id="btnCloseModal">&times;</span>
            <h4>Connexion</h4>
            <form id="loginForm" method="POST">
              <input type="text" name="identifiant" maxlength="200" placeholder="**********" required>
              <input type="password" name="password" maxlength="200" placeholder="**********" required>
              <input type="submit" value="Se connecter" name="connecter">
            </form>
          </div>
        </div>
      </div>
    </header>
    <main>
      <?php if (!empty($results[0]['nom'])) : ?>
        <div class="dropzoneContainer containerUtilisateur">
          <h2><?php echo htmlspecialchars($results[0]['nom']); ?> <span class="arrow">▶</span></h2>
          <div class="hide">
            <h3>Cours</h3>
            <div id="fileList1"></div>
            <h3>Exercices</h3>
            <div id="fileList2"></div>
            <h3>DM</h3>
            <div id="fileList3"></div>
            <h3>DS</h3>
            <div id="fileList4"></div>
          </div>
        </div>
      <?php endif; ?>

      <?php if (!empty($results[1]['nom'])) : ?>
        <div class="dropzoneContainer containerUtilisateur">
          <h2><?php echo htmlspecialchars($results[1]['nom']); ?> <span class="arrow">▶</span></h2>
          <div class="hide">
            <h3>Cours</h3>
            <div id="fileList5"></div>
            <h3>Exercices</h3>
            <div id="fileList6"></div>
            <h3>DM</h3>
            <div id="fileList7"></div>
            <h3>DS</h3>
            <div id="fileList8"></div>
          </div>
        </div>
      <?php endif; ?>

      <?php if (!empty($results[2]['nom'])) : ?>
        <div class="dropzoneContainer containerUtilisateur">
          <h2><?php echo htmlspecialchars($results[2]['nom']); ?> <span class="arrow">▶</span></h2>
          <div class="hide">
            <h3>Cours</h3>
            <div id="fileList9"></div>
            <h3>Exercices</h3>
            <div id="fileList10"></div>
            <h3>DM</h3>
            <div id="fileList11"></div>
            <h3>DS</h3>
            <div id="fileList12"></div>
          </div>
        </div>
      <?php endif; ?>

      <?php if (!empty($results[3]['nom'])) : ?>
        <div class="dropzoneContainer containerUtilisateur">
          <h2><?php echo htmlspecialchars($results[3]['nom']); ?> <span class="arrow">▶</span></h2>
          <div class="hide">
            <h3>Cours</h3>
            <div id="fileList13"></div>
            <h3>Exercices</h3>
            <div id="fileList14"></div>
            <h3>DM</h3>
            <div id="fileList15"></div>
            <h3>DS</h3>
            <div id="fileList16"></div>
          </div>
        </div>
      <?php endif; ?>
    </main>
  </div>
  <footer class="pied-de-page">
    <p>Année scolaire <span id="anneeScolaire"></span></p>
  </footer>
  <script>
    // Fonction pour récupérer la liste des fichiers depuis le serveur pour un dossier spécifié
    function fetchFileList(folder, fileListId) {
      fetch("./php/get_file_list.php?folder=" + folder)
        .then((response) => {
          if (!response.ok) {
            throw new Error("Erreur lors de la récupération des fichiers.");
          }
          return response.json();
        })
        .then((data) => {
          const fileListElement = document.getElementById(fileListId);
          fileListElement.innerHTML = "";

          if (data.length === 0) {
            const noFileListItem = document.createElement("li");
            noFileListItem.textContent = "Prochainement !";
            fileListElement.appendChild(noFileListItem);
          } else {
            data.forEach((file) => {
              const listItem = document.createElement("li");
              const link = document.createElement("a");
              link.href = "uploads/" + folder + "/" + file;
              link.textContent = file;
              link.style.marginRight = "10px";

              listItem.appendChild(link);

              // Crée une balise <img> avec l'icône du bouton de téléchargement
              const downloadIcon = document.createElement("img");
              downloadIcon.src = "./assets/icones/iconDL.svg";
              downloadIcon.alt = "Télécharger";
              downloadIcon.classList.add("download-icon");
              listItem.appendChild(downloadIcon);
              fileListElement.appendChild(listItem);

              downloadIcon.addEventListener("click", () => {
                downloadFile(link.href, file);
              });
            });
          }
        })
        .catch((error) => {
          const fileListElement = document.getElementById(fileListId);

          if (fileListElement) {
            fileListElement.innerHTML = "";
            const noFileListItem = document.createElement("li");
            noFileListItem.textContent = "Prochainement !";
            fileListElement.appendChild(noFileListItem);
          } else {
            // console.error("Element with ID fileListId not found.");
          }
        });
    }

    function downloadFile(url, filename) {
      const xhr = new XMLHttpRequest();
      xhr.open("GET", url, true);
      xhr.responseType = "blob";

      xhr.onload = function() {
        if (xhr.status === 200) {
          // Crée un objet URL pour le blob
          const blobUrl = URL.createObjectURL(xhr.response);

          // Crée un lien de téléchargement
          const a = document.createElement("a");
          a.href = blobUrl;
          a.download = filename;
          a.style.display = "none";

          // Ajoute le lien à la page et déclenche le téléchargement
          document.body.appendChild(a);
          a.click();

          // Supprime le lien après le téléchargement
          window.URL.revokeObjectURL(blobUrl);
        }
      };

      xhr.send();
    }

    // Appeler la fonction pour récupérer la liste des fichiers dans chaque dossier
    fetchFileList("uploads1", "fileList1");
    fetchFileList("uploads2", "fileList2");
    fetchFileList("uploads3", "fileList3");
    fetchFileList("uploads4", "fileList4");
    fetchFileList("uploads5", "fileList5");
    fetchFileList("uploads6", "fileList6");
    fetchFileList("uploads7", "fileList7");
    fetchFileList("uploads8", "fileList8");
    fetchFileList("uploads9", "fileList9");
    fetchFileList("uploads10", "fileList10");
    fetchFileList("uploads11", "fileList11");
    fetchFileList("uploads12", "fileList12");
    fetchFileList("uploads13", "fileList13");
    fetchFileList("uploads14", "fileList14");
    fetchFileList("uploads15", "fileList15");
    fetchFileList("uploads16", "fileList16");
  </script>
  <script src="./assets/js/jquery-3.7.0.min.js"></script>
  <script src="./assets/js/script.js"></script>
</body>

</html>
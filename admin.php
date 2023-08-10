<?php
session_start();
if (!isset($_SESSION['identifiant'])) {
  header("Location: ./index.php");
  exit();
}

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
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mathématiques - Bastien C.</title>
  <link rel="icon" href="./assets/images/avatar.png" type="image/png">
  <link rel="stylesheet" href="./assets/css/style.css" />
  <script src="dropzone/dropzone.min.js"></script>
  <link rel="stylesheet" href="dropzone/dropzone.min.css" />
</head>

<body>
  <div class="contenu">
    <header>
      <div class="avatar avatarAdmin">
        <img src="./assets/images/avatar.png" alt="Avatar" class="avatarImg" />
        <div>
          <h1>Administrateur</h1>
          <p>Gérer mes fichiers</p>
        </div>
        <a href="./index.php"><img src="./assets/icones/sync.svg" alt="retour" class="log" /></a>
        <a href="./php/deconnexion.php"><img src="./assets/icones/logout.svg" alt="deconnexion" class="log2" title="Déconnexion" /></a>
      </div>
    </header>
    <main class="dropzoneAdmin">
      <!-- Dropzone -->

      <div class="dropzoneContainer containerAdmin">
        <div class="dropzoneHeader">
          <h2><?php echo htmlspecialchars($results[0]['nom']); ?></h2> <img src="./assets/icones/edit.svg" alt="editer" class="editClasse" title="Editer">
          <form method="POST" class="editForm">
            <input type="text" name="nom" maxlength="200" value="<?php echo htmlspecialchars($results[0]['nom']); ?>">
            <input type="submit" value="Modifier" name="modifier">
            <?php
            if (!empty($_POST['modifier'])) {
              $nom = $_POST['nom'];
              $sql = "UPDATE classes SET nom = :nom WHERE idclasse = '1'";
              $stmt = $connexion->prepare($sql);
              $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
              $stmt->execute();
              echo "<meta http-equiv='refresh' content='0'>";
              exit();
            } ?>
          </form>
        </div>
        <div class="hide">
          <h3>Cours</h3>
          <div class="dropzone" id="dropzone1">
            <div class="dz-message">
              Glissez-déposez les fichiers ici ou cliquez pour les sélectionner.
            </div>
          </div>
          <ul id="fileList1"></ul>
          <h3>Exercices</h3>
          <div class="dropzone" id="dropzone2">
            <div class="dz-message">
              Glissez-déposez les fichiers ici ou cliquez pour les sélectionner.
            </div>
          </div>
          <ul id="fileList2"></ul>
          <h3>DM</h3>
          <div class="dropzone" id="dropzone3">
            <div class="dz-message">
              Glissez-déposez les fichiers ici ou cliquez pour les sélectionner.
            </div>
          </div>
          <ul id="fileList3"></ul>
          <h3>DS</h3>
          <div class="dropzone" id="dropzone4">
            <div class="dz-message">
              Glissez-déposez les fichiers ici ou cliquez pour les sélectionner.
            </div>
          </div>
          <ul id="fileList4"></ul>
        </div>
      </div>

      <div class="dropzoneContainer containerAdmin">
        <div class="dropzoneHeader">
          <h2><?php echo htmlspecialchars($results[1]['nom']); ?></h2> <img src="./assets/icones/edit.svg" alt="editer" class="editClasse" title="Editer">
          <form method="POST" class="editForm">
            <input type="text" name="nom" maxlength="200" value="<?php echo htmlspecialchars($results[1]['nom']); ?>">
            <input type="submit" value="Modifier" name="modifier1">
            <?php
            if (!empty($_POST['modifier1'])) {
              $nom = $_POST['nom'];
              $sql = "UPDATE classes SET nom = :nom WHERE idclasse = '2'";
              $stmt = $connexion->prepare($sql);
              $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
              $stmt->execute();
              echo "<meta http-equiv='refresh' content='0'>";
              exit();
            } ?>
          </form>
        </div>
        <div class="hide">
          <h3>Cours</h3>
          <div class="dropzone" id="dropzone5">
            <div class="dz-message">
              Glissez-déposez les fichiers ici ou cliquez pour les sélectionner.
            </div>
          </div>
          <ul id="fileList5"></ul>
          <h3>Exercices</h3>
          <div class="dropzone" id="dropzone6">
            <div class="dz-message">
              Glissez-déposez les fichiers ici ou cliquez pour les sélectionner.
            </div>
          </div>
          <ul id="fileList6"></ul>
          <h3>DM</h3>
          <div class="dropzone" id="dropzone7">
            <div class="dz-message">
              Glissez-déposez les fichiers ici ou cliquez pour les sélectionner.
            </div>
          </div>
          <ul id="fileList7"></ul>
          <h3>DS</h3>
          <div class="dropzone" id="dropzone8">
            <div class="dz-message">
              Glissez-déposez les fichiers ici ou cliquez pour les sélectionner.
            </div>
          </div>
          <ul id="fileList8"></ul>
        </div>
      </div>

      <div class="dropzoneContainer containerAdmin">
        <div class="dropzoneHeader">
          <h2><?php echo htmlspecialchars($results[2]['nom']); ?></h2> <img src="./assets/icones/edit.svg" alt="editer" class="editClasse" title="Editer">
          <form method="POST" class="editForm">
            <input type="text" name="nom" maxlength="200" value="<?php echo htmlspecialchars($results[2]['nom']); ?>">
            <input type="submit" value="Modifier" name="modifier2">
            <?php
            if (!empty($_POST['modifier2'])) {
              $nom = $_POST['nom'];
              $sql = "UPDATE classes SET nom = :nom WHERE idclasse = '3'";
              $stmt = $connexion->prepare($sql);
              $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
              $stmt->execute();
              echo "<meta http-equiv='refresh' content='0'>";
              exit();
            } ?>
          </form>
        </div>
        <div class="hide">
          <h3>Cours</h3>
          <div class="dropzone" id="dropzone9">
            <div class="dz-message">
              Glissez-déposez les fichiers ici ou cliquez pour les sélectionner.
            </div>
          </div>
          <ul id="fileList9"></ul>
          <h3>Exercices</h3>
          <div class="dropzone" id="dropzone10">
            <div class="dz-message">
              Glissez-déposez les fichiers ici ou cliquez pour les sélectionner.
            </div>
          </div>
          <ul id="fileList10"></ul>
          <h3>DM</h3>
          <div class="dropzone" id="dropzone11">
            <div class="dz-message">
              Glissez-déposez les fichiers ici ou cliquez pour les sélectionner.
            </div>
          </div>
          <ul id="fileList11"></ul>
          <h3>DS</h3>
          <div class="dropzone" id="dropzone12">
            <div class="dz-message">
              Glissez-déposez les fichiers ici ou cliquez pour les sélectionner.
            </div>
          </div>
          <ul id="fileList12"></ul>
        </div>
      </div>

      <div class="dropzoneContainer containerAdmin">
        <div class="dropzoneHeader">
          <h2><?php echo htmlspecialchars($results[3]['nom']); ?></h2> <img src="./assets/icones/edit.svg" alt="editer" class="editClasse" title="Editer">
          <form method="POST" class="editForm">
            <input type="text" name="nom" maxlength="200" value="<?php echo htmlspecialchars($results[3]['nom']); ?>">
            <input type="submit" value="Modifier" name="modifier4">
            <?php
            if (!empty($_POST['modifier4'])) {
              $nom = $_POST['nom'];
              $sql = "UPDATE classes SET nom = :nom WHERE idclasse = '4'";
              $stmt = $connexion->prepare($sql);
              $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
              $stmt->execute();
              echo "<meta http-equiv='refresh' content='0'>";
              exit();
            } ?>
          </form>
        </div>
        <div class="hide">
          <h3>Cours</h3>
          <div class="dropzone" id="dropzone13">
            <div class="dz-message">
              Glissez-déposez les fichiers ici ou cliquez pour les sélectionner.
            </div>
          </div>
          <ul id="fileList13"></ul>
          <h3>Exercices</h3>
          <div class="dropzone" id="dropzone14">
            <div class="dz-message">
              Glissez-déposez les fichiers ici ou cliquez pour les sélectionner.
            </div>
          </div>
          <ul id="fileList14"></ul>
          <h3>DM</h3>
          <div class="dropzone" id="dropzone15">
            <div class="dz-message">
              Glissez-déposez les fichiers ici ou cliquez pour les sélectionner.
            </div>
          </div>
          <ul id="fileList15"></ul>
          <h3>DS</h3>
          <div class="dropzone" id="dropzone16">
            <div class="dz-message">
              Glissez-déposez les fichiers ici ou cliquez pour les sélectionner.
            </div>
          </div>
          <ul id="fileList16"></ul>
        </div>
      </div>
    </main>
  </div>
  <footer class="pied-de-page pdpadmin">
    <p>Année scolaire <span id="anneeScolaire"></span></p>
  </footer>

  <script>
    // Fonction pour initialiser Dropzone pour chaque élément avec la classe "dropzone"
    function initDropzone(dropzoneId, fileListId, destinationFolder) {
      return new Dropzone("#" + dropzoneId, {
        url: "./php/upload.php",
        acceptedFiles: ".pdf",
        maxFilesize: 5,
        addRemoveLinks: true,
        dictRemoveFile: "Annuler",
        init: function() {
          this.on("sending", function(file, xhr, formData) {
            formData.append("folder", destinationFolder); // Ajoute le paramètre "folder" à la requête
          });
          this.on("success", function(file, response) {
            fetchFileList(fileListId, destinationFolder);
          });
          this.on("removedfile", function(file) {
            deleteFile(file.name, fileListId, destinationFolder);
          });
        },
      });
    }

    // Fonction pour récupérer la liste des fichiers PDF disponibles depuis le serveur
    function fetchFileList(fileListId, destinationFolder) {
      fetch("./php/get_file_list.php?folder=" + destinationFolder)
        .then((response) => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.json();
        })
        .then((data) => {
          const fileListElement = document.getElementById(fileListId);
          fileListElement.innerHTML = "";

          if (data.length === 0) {
            // const noFileListItem = document.createElement("li");
            // noFileListItem.textContent = "Aucun fichier !";
            // fileListElement.appendChild(noFileListItem);
          } else {
            data.forEach((file) => {
              const listItem = document.createElement("li");
              const link = document.createElement("a");
              link.href = "uploads/" + destinationFolder + "/" + file;
              link.textContent = file;
              link.style.marginRight = "10px";
              listItem.appendChild(link);

              // Icone suppression
              const deleteIcon = document.createElement("img");
              deleteIcon.src = "./assets/icones/iconDelete.svg";
              deleteIcon.alt = "Supprimer";
              deleteIcon.classList.add("delete-icon");
              deleteIcon.dataset.fileName = file; // On utilise le nom du fichier comme attribut personnalisé
              listItem.appendChild(deleteIcon);
              fileListElement.appendChild(listItem);

              // Ajouter le gestionnaire d'événements pour le clic sur l'icône de suppression
              deleteIcon.addEventListener("click", () => {
                deleteFile(file, fileListId, destinationFolder);
              });
            });
          }
        })
        .catch((error) => {
          // const fileListElement = document.getElementById(fileListId);
          // fileListElement.innerHTML = "";
          // const noFileListItem = document.createElement("li");
          // noFileListItem.textContent = "Aucun dossier !";
          // fileListElement.appendChild(noFileListItem);
        });
    }

    // Fonction pour supprimer un fichier (implémentez cette fonction pour effectuer la suppression côté serveur)
    function deleteFile(fileName, fileListId, destinationFolder) {
      // Ici, vous pouvez effectuer une requête pour supprimer le fichier côté serveur
      fetch("./php/delete_file.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            fileName: fileName,
            folder: destinationFolder,
          }),
        })
        .then((response) => response.json())
        .then((data) => {
          // Recharger la liste des fichiers après la suppression
          fetchFileList(fileListId, destinationFolder);
        });
    }

    // Initialiser toutes les dropzones avec la classe "dropzone" et leurs listes de fichiers respectives
    const dropzones = [{
        id: "dropzone1",
        fileListId: "fileList1",
        destinationFolder: "uploads1",
      },
      {
        id: "dropzone2",
        fileListId: "fileList2",
        destinationFolder: "uploads2",
      },
      {
        id: "dropzone3",
        fileListId: "fileList3",
        destinationFolder: "uploads3",
      },
      {
        id: "dropzone4",
        fileListId: "fileList4",
        destinationFolder: "uploads4",
      },
      {
        id: "dropzone5",
        fileListId: "fileList5",
        destinationFolder: "uploads5",
      },
      {
        id: "dropzone6",
        fileListId: "fileList6",
        destinationFolder: "uploads6",
      },
      {
        id: "dropzone7",
        fileListId: "fileList7",
        destinationFolder: "uploads7",
      },
      {
        id: "dropzone8",
        fileListId: "fileList8",
        destinationFolder: "uploads8",
      },
      {
        id: "dropzone9",
        fileListId: "fileList9",
        destinationFolder: "uploads9",
      },
      {
        id: "dropzone10",
        fileListId: "fileList10",
        destinationFolder: "uploads10",
      },
      {
        id: "dropzone11",
        fileListId: "fileList11",
        destinationFolder: "uploads11",
      },
      {
        id: "dropzone12",
        fileListId: "fileList12",
        destinationFolder: "uploads12",
      },
      {
        id: "dropzone13",
        fileListId: "fileList13",
        destinationFolder: "uploads13",
      },
      {
        id: "dropzone14",
        fileListId: "fileList14",
        destinationFolder: "uploads14",
      },
      {
        id: "dropzone15",
        fileListId: "fileList15",
        destinationFolder: "uploads15",
      },
      {
        id: "dropzone16",
        fileListId: "fileList16",
        destinationFolder: "uploads16",
      },
    ];

    dropzones.forEach((dropzone) => {
      initDropzone(
        dropzone.id,
        dropzone.fileListId,
        dropzone.destinationFolder
      );
      fetchFileList(dropzone.fileListId, dropzone.destinationFolder);
    });

    // Ajouter l'écouteur d'événement pour les boutons de suppression
    document.addEventListener("click", (event) => {
      if (event.target.tagName === "IMG") {
        const fileName = event.target.dataset.fileName;
        const fileListId = event.target.closest("ul").id;
        const destinationFolder = dropzones.find(
          (dropzone) => dropzone.fileListId === fileListId
        ).destinationFolder;
        deleteFile(fileName, fileListId, destinationFolder);
      }
    });
  </script>
  <script src="./assets/js/jquery-3.7.0.min.js"></script>
  <script src="./assets/js/script.js"></script>
</body>

</html>
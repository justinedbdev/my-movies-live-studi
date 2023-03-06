<!DOCTYPE html>
<html lang="fr-FR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../styles/main.css" />
    <title>My movies - Publier un film</title>
  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="../index.php"
            ><i class="bi bi-film"></i>My Movies</a
          >
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="../index.php">Home</a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link active"
                  aria-current="page"
                  href="./views/create.php"
                  >Publier un film</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main>
      <h3>Publier un nouveau film</h3>
      <form class="container-fluid w-50" method="POST">
        <label for="title">Titre</label>
        <input
          type="text"
          name="title"
          id="title"
          placeholder="Le titre du film"
          class="form-control"
        />
        <label for="synopsis">Synopsis</label>
        <textarea
          name="synopsis"
          id="synopsis"
          rows="10"
          placeholder="Le résumé du film"
          class="form-control"
        ></textarea>
        <label for="imageUrl">Image</label>
        <input
          type="url"
          name="imageUrl"
          id="imageUrl"
          placeholder="L'URL de l'image du film"
          class="form-control"
        />
        <label for="releaseDate">Date de sortie</label>
        <input
          type="date"
          name="releaseDate"
          id="releaseDate"
          class="form-control"
        />
        <label for="director">Réalisateur</label>
        <input
          type="text"
          name="director"
          id="director"
          placeholder="Le réalisateur du film"
          class="form-control"
        />
        <label for="category">Catégorie</label>
        <select name="categoryId" id="category" class="form-select">
          <option value="" selected>-- Sélectionner une catégorie --</option>
          <option value="1">Horreur</option>
          <option value="2">Drame</option>
          <option value="3">Comédie</option>
        </select>
        <input type="submit" value="Publier" class="btn btn-primary mt-3" />
      </form>
    </main>
  </body>
</html>

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
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link" href="../index.php">Home</a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link"
                  href="./create.php"
                  >Publier un film</a
                >
              </li>
            </ul>
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="./views/register.php"
                  >S'inscrire</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./views/login.php"
                  >Se connecter</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <?php
    function loadClass(string $class) 
    {
      if ($class === "DotEnv") {
        require_once "../config/$class.php";
      } else if (str_contains($class, "Controller")) {
        require_once "../Controller/$class.php";
      } else {
        require_once "../Entity/$class.php";
      }
    }
    spl_autoload_register("loadClass");
    $movieController = new MovieController();
    $categoryController = new CategoryController();
    $categories = $categoryController->getAll();

    $movie = $movieController->get($_GET["id"]);

    if ($_POST) {
      $movie->hydrate($_POST);
      $movieController->update($movie);
      echo "<script>window.location='../index.php'</script>";
    } ?>

    <main>
      <h3>Modifier le film <?= $movie->getTitle() ?></h3>
      <form class="container-fluid w-50" method="POST">
        <label for="title">Titre</label>
        <input
          type="text"
          name="title"
          id="title"
          value="<?= $movie->getTitle()?>"
          placeholder="Le titre du film"
          class="form-control"
        />
        <label for="description">Synopsis</label>
        <textarea
          name="description"
          id="description"
          rows="10"
          placeholder="Le résumé du film"
          class="form-control"
        ><?= $movie->getDescription()?></textarea>
        <label for="image_url">Image</label>
        <input
          type="url"
          name="image_url"
          id="image_url"
          value="<?= $movie->getImage_url()?>"
          placeholder="L'URL de l'image du film"
          class="form-control"
        />
        <label for="release_date">Date de sortie</label>
        <input
          type="date"
          name="release_date"
          id="release_date"
          value="<?= $movie->getRelease_date()?>"
          class="form-control"
        />
        <label for="director">Réalisateur</label>
        <input
          type="text"
          name="director"
          id="director"
          value="<?= $movie->getDirector()?>"
          placeholder="Le réalisateur du film"
          class="form-control"
        />
        <label for="category_id">Catégorie</label>
        <select name="category_id" id="category_id" class="form-select">
          <option value="" selected>-- Sélectionner une catégorie --</option>
          <?php
                foreach ($categories as $category) : ?>
                  <option <?= $category->getId() === $movie->getCategory_id() ? "selected" : "" ?> value="<?= $category->getId() ?>"><?= $category->getName() ?></option>
                <?php endforeach ?>
        </select>
        <input type="submit" value="Publier" class="btn btn-primary mt-3" />
      </form>
    </main>
  </body>
</html>

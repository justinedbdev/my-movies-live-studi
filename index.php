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
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./styles/main.css" />
    <title>My movies</title>
  </head>

  <body>
    <?php
    
    require_once "./Entity/Movie.php";
    require_once "./Controller/MovieController.php";

    $movieController = new MovieController();
    $movies = $movieController->getAll();

    /* $movie = new Movie([
      "id" => 1,
      "title" => "Avatar",
      "description" => "Un film avec des gens bleus",
      "image_url" => "https://www.avoir-alire.com/IMG/jpg/Avatar_special_edition900.jpg",
      "release_date" => "2009-12-16",
      "director" => "James Cameron",
      "category_id" => 3
    ]); */
    ?>

    <header>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="./index.php">
            <i class="bi bi-film"></i>My Movies</a
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
                <a
                  class="nav-link active"
                  aria-current="page"
                  href="./index.php"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./views/create.php"
                  >Publier un film</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main>
      <img class="logo" src="./images/logo_white.svg" alt="logo my movies" />
      <h1>My movies</h1>
      <h3>Découvrez et partagez des films !</h3>

      <section class="container d-flex justify-content-center">
        <?php
        foreach ($movies as $movie): ?>
          <div class="card m-3" style="width: 18rem;">
            <img
              class="card-img-top"
              src="<?= $movie->getImage_url() ?>"
              alt="<?= $movie->getTitle() ?>"
            />
            <div class="card-body">
              <h5 class="card-title"><?= $movie->getTitle() ?></h5>
              <h6 class="card-subtitle mb-2 text-muted"><?= $movie->getRelease_date() ?></h6>
              <p class="card-text"><?= $movie->getDescription() ?></p>
              <a
                href="#"
                class="btn btn-warning"
                data-toggle="tooltip"
                data-placement="top"
                title="Modifier"
                ><i class="fa-regular fa-pen-to-square"></i
              ></a>
              <a
                href="#"
                class="btn btn-danger"
                data-toggle="tooltip"
                data-placement="top"
                title="Supprimer"
                ><i class="fa-regular fa-trash-can"></i
              ></a>
            </div>
          </div>
        <?php endforeach; ?>
      </section>
    </main>

    <footer></footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

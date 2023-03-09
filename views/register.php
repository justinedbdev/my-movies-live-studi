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
    <link rel="stylesheet" href="../styles/main.css" />
    <title>My movies</title>
  </head>

  <body>
    <?php
    session_start();
    function loadClass(string $class) 
    {
      if ($class === "DotEnv") {
        require_once "../config/$class.php";
      } else if(str_contains($class, "Controller")) {
        require_once "../Controller/$class.php";
      } else {
        require_once "../Entity/$class.php";
      }
    }

    spl_autoload_register("loadClass");

    $userController = new UserController();

    if ($_POST) {
      if ($_POST["password"] === $_POST["confirmPassword"] ) {
        unset($_POST["confirmassword"]);
        $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $newUser = new User($_POST);
        $userController->create($newUser);
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["email"] = $_POST["email"];
        echo "<script>window.location='../index.php'</script>";
      } else {
        echo "<p>Le mot de passe ne correspond pas.</p>";
      }
    }

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
          <a class="navbar-brand" href="../index.php">
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
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a
                  class="nav-link"
                  href="../index.php"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./create.php"
                  >Publier un film</a
                >
              </li>
            </ul>
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./register.php"
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

    <main>
      <img src="../images/logo_white.svg" alt="logo my movies" />
      <h1 class="mb-5">Découvrez et partagez des films !</h1>

      <h4>Créer un compte utilisateur</h4>
      <section class="container d-flex justify-content-center">
        <form method="post">
          <label for="username">Nom d'utilisateur</label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Nom d'utilisateur" required>
          <label for="email">E-mail</label>
          <input type="text" class="form-control" name="email" id="email" placeholder="Votre adresse e-mail" required>
          <label for="password">Mot de passe</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Votre mot de passe" required>
          <label for="confirmPassword">Confirmer le mot de passe</label>
          <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirmez votre mot de passe" required>

          <input type="submit" class="btn btn-primary" value="Créer un compte">
        </form>
      </section>

    </main>
  </body>
</html>
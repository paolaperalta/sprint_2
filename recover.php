<?php
include_once("controllers/funciones.php");

if (isset($_SESSION["nombre"])) {
  header("Location: index.php");
  exit;
} else {
  if ($_POST) {
    $errores = validar($_POST);
    if (count($errores) == 0) {
      $usuario = buscarNombreEmail($_POST["email-recover"], $_POST["nombre-recover"]);
      if($usuario == null) {
        $errores["email"] = "Los datos no corresponden a ningún usuario registrado";
      } else {
        $_SESSION["email"] = $_POST["email-recover"];
        header("Location: changepass.php");
        exit;
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
<meta charset="utf-8">
  <head>
    <?php
    include_once('head.php');
    ?>
  <title>Reestablecer Contraseña</title>
  </head>
  <body>
    <?php include_once('nav.php');
    ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-4 titulo-login">
          <h2>RECUPERAR CUENTA</h2>
        </div>
      </div>
      <br>
      <form action="" class="" method="POST">
        <?php
        if(isset($errores)):?>
        <ul class="alert alert-danger halert">
        <?php
        foreach ($errores as $key => $value) :?>
          <li class="etiqueta"> <?=$value;?> </li>
          <?php endforeach;?>
        </ul>
        <br>
        <?php endif;?>
        <label for="nombre-recover" class="etiquetas"><b>NOMBRE</b></label>
        <input class="completar" type="text" placeholder="Ingrese su nombre" name="nombre-recover" value="" required>
        <br>
        <label for="email-recover" class="etiquetas"><b>EMAIL</b></label>
        <input class="completar" type="email" placeholder="Ingrese su email" name="email-recover" value="" required>
        <br>
        <br>
        <button type="submit" class="btn btn-info hsubmit" data-toggle="modal" data-target="#myModal" aria-disabled="true" autocomplete="off">Reestablecer</button>
        <a href="login.php"><button type="button" class="btn btn-info hcancel" data-toggle="modal" data-target="#myModal" aria-disabled="true" autocomplete="on">Cancelar</button></a>
        <br>
        <br>
        <br>
      </form>
    </div>
    <footer>
    <?php
    include_once('footer.php');
     ?>
    </footer>
    <!-- JavaScript Libraries -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/scrollreveal/scrollreveal.min.js"></script>

    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>
  </body>
</html>

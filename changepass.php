<?php
include_once("controllers/funciones.php");

if (isset($_SESSION["nombre"])) {
  header("Location: index.php");
  exit;
} else {
  if ($_POST) {
    $errores = validar($_POST);
    if (count($errores) == 0) {
      $registro = armarRegistroOlvide($_POST);
      header("Location: login.php");
      exit;
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
  <title>Cambiar Contraseña</title>
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
        <label for="email" class="etiquetas"><b>EMAIL (Será su usuario)</b></label>
        <input class="completar" name="email" type="email" id="email" placeholder="Ingrese su email" value="<?=($_SESSION["email"]); session_destroy();?>" readonly/>
        <br>
        <label for="password" class="etiquetas"><b>NUEVA CONTRASEÑA</b></label>
        <input class="completar" name="password" type="password" id="password" placeholder="Ingrese una contraseña" value="" required/>
        <label for="repassword" class="etiquetas"><b>CONFIRMAR NUEVA CONTRASEÑA</b></label>
        <input class="completar" name="repassword" type="password" id="repassword" placeholder="Confirme contraseña" value="" required/>
        <br>
        <br>
        <button type="submit" class="btn btn-info hsubmit" data-toggle="modal" data-target="#myModal" aria-disabled="true" autocomplete="off">Establecer</button>
        <a class="signUp" href="login.php">Cancelar</a>
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

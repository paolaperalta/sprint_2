<?php
include_once("controllers/funciones.php");

if (isset($_SESSION["nombre"])) {
  header("Location: index.php");
  exit;
} else {
  if ($_POST) {
    $errores = validar($_POST);
    if (count($errores) == 0) {
      $usuario = buscarEmail($_POST["email"]);
      if ($usuario == null) {
        $errores["email"] = "El email ingresado no está registrado";
      } else {
        if (password_verify($_POST["password"],$usuario["password"]) === false) {
          $errores["password"] = "Los datos ingresados son incorrectos";
        } else {
          crearSesion($usuario, $_POST);
          
          if (validarUsuario()) {
            header("Location: index.php");
            exit;
          } else {
            header("Location: signup.php");
            exit;
          }
        }
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
  </head>
  <body>
    <?php include_once('nav.php');
    ?>
    <div class="container">

      <div class="row">
        <div class="col-lg-4 offset-4 titulo-login-pao">
          <h2 class="text-center">INICIAR SESIÓN</h2>
        </div>
      </div>


       <div class="row">
        <div class="col-lg-8 offset-2">
          <form class="" action="" method="POST">
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
            <label for="email" class="etiquetas"><b>EMAIL</b></label>
            <input class="completar" type="email" placeholder="Ingrese su email" id="email" name="email" value="" required>
            <br>
            <br>
            <label for="password" class="etiquetas"><b>CONTRASEÑA</b></label>
            <input class="completar" type="password" placeholder="Ingrese su contraseña" name="password" id="password" value="" required>
            <br>
            <br>
            <button type="submit" class="p_btn btn btn-info" data-toggle="modal" data-target="#myModal" aria-disabled="true" autocomplete="off">Iniciar sesión
            </button>
            <br>
            <a class="signUp" href="signup.php">¿Usuario nuevo? Creá una cuenta</a>
            <div>
              <label>
                <input type="checkbox" style="width: 24px;">Recordarme
              </label>
            </div>
             <a class="recover" href="recover.php">¿Olvidaste tu contraseña?</a>

          </form>
        </div>
      </div>

    </div>

    <footer>
    <?php
    include_once("footer.php");
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

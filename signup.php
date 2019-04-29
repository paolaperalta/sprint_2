<?php
include_once("controllers/funciones.php");

if (isset($_SESSION["nombre"])) {
  header("Location: index.php");
} else {
  if ($_POST) {
    $errores = validar($_POST);
    if(count($errores) == 0){
      $user = buscarEmail($_POST["email"]);
      if ($user != null) {
        $errores["email"] = "El email ya pertenece a un usuario registrado";
        } else {
        $avatar = armarAvatar($_FILES);
        $registro = armarRegistro($_POST,$avatar);
        guardarUsuario($registro);
        header("location: login.php");
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
 <?php include_once("head.php");?>
  
  <title>Registro</title>
</head>
<body>
  <?php include_once("nav.php");?>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 offset-4 titulo-login-pao">
          <h2>REGISTRARME</h2>
      </div>
    </div>
    <!--<section class="section-t4">-->
          <br>

      <div class="row">
        <div class="col-lg-8 offset-2">
          <form action="" class="" method="POST" enctype="multipart/form-data">
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
            <label for="nombre" class="etiquetas"><b>NOMBRE</b></label>
            <input class="completar" name="nombre" type="text" id="nombre" placeholder="Ingrese su nombre" value="<?=(isset($errores["nombre"]) )? "" : inputUsuario("nombre");?>" required/>
            <br>
            <label for="email" class="etiquetas"><b>EMAIL (Será su usuario)</b></label>
            <input class="completar" name="email" type="email" id="email" placeholder="Ingrese su email" value="<?=(isset($errores["email"]) )? "" : inputUsuario("email");?>" required/>
            <br>
            <label for="password" class="etiquetas"><b>CONTRASEÑA</b></label>
            <input class="completar" name="password" type="password" id="password" placeholder="Ingrese una contraseña" value="" required/>
            <label for="repassword" class="etiquetas"><b>CONFIRMAR CONTRASEÑA</b></label>
            <input class="completar" name="repassword" type="password" id="repassword" placeholder="Confirme contraseña" value="" required/>
            <br>
            <label class="etiquetas" for="avatar"><b>AVATAR DE PERFIL</b></label>
            <input class="box" type="file" name="avatar" value="" required>
            <br>
            <br>
            <button type="submit" class="p_btn btn btn-info" data-toggle="modal" data-target="#myModal" aria-disabled="true" autocomplete="off">Registrarme</button>
            <a class="signUp" href="login.php">¡Ya tengo una cuenta!</a>
            <br>
            <br>
            <br>
          </form>
        </div>
      </div>
      <!--</section>-->
    </div>
    <footer>
      <?php
      include_once('footer.php');
      ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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

<?php
include_once("controllers/funciones.php");

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
<meta charset="utf-8">

  <head>
  <?php
  include 'head.php';
   ?>

    </head>


    <body>
      <?php include 'nav.php';
       ?>

        <div class="container">
          <div class="row">
            <div class="col-lg-4 offset-4 titulo-login">
                <h2>RECUPERAR CUENTA</h2>
            </div>

          </div>

        <br>
        <label for="email" class="etiquetas"><b>EMAIL</b></label>
        <input class="completar" type="email" placeholder="Ingrese su email" name="email" required>
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
include 'footer.php';
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

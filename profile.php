<?php
include_once("controllers/funciones.php");

if (!isset($_SESSION["nombre"])) {
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
  <head>
  <?php
    include_once("head.php");
  ?>
  </head>

  <body>
  <?php
    include_once("nav.php");
  ?>
  <div class="containerProfile">
    <section class="seccionTitulo">
      <div class="containerTitulo">
        <h2 class="titulo-profile">MI PERFIL</h2>
        <br>
      </div>
    </section>
    <section class="seccionAvatar">
      <div class="containerAvatar">
        <img src="img/<?=$_SESSION["avatar"];?>" alt="" class="imagenAvatar">
      </div>
    </section>
    <br>
    <section class="seccionDatos">
      <div class="containerDatos">
        <h5 class="etiquetas"><b>NOMBRE: </b><?=$_SESSION["nombre"];?></h3>
        <br>
        <h5 class="etiquetas"><b>EMAIL: </b><?=$_SESSION["email"];?></h3>
        <br>
      </div>
    </section>
    <footer>
      <?php
        include_once('footer.php');
      ?>
    </footer>
  </div>


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

<?php
include_once("controllers/funciones.php");
 ?>

   <!--/ Nav Star /-->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <!--<a class="navbar-brand text-brand" href="index.html">Estate<span class="color-b">Agency</span></a>-->
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Macetas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Plantas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Deco</a>
          </li>
          <li>
            <a class="navbar-brand text-brand" href="index.php"> <img src="img/IsologoGardenia.png" class="img-fluid" alt=""> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="faqs.php">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Nosotros</a>
          </li>
          <li>
            <a class="nav-link" href="">Contacto</a>
          </li>
        </ul>
      </div>
    </div>

    <?php
      if (isset($_SESSION["nombre"])) { ?>
        <a class="login" href="profile.php"><?php echo $_SESSION["email"];?></a><?php echo "&nbsp;&nbsp;|&nbsp;&nbsp;"; ?><a class="login" href="logout.php">Cerrar Sesión</a>
        <?php } else { ?>
        <a class="login" href="login.php">Ingresar</a>
    <?php }?>
  </nav>
  <!--/ Nav End /-->

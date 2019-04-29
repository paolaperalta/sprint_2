<?php
  session_start();

/*----Función de debug----*/
  function dd($dato) {
    echo "<pre>";
    var_dump($dato);
    echo "</pre>";
    exit;
  }

/*----Función de validación para Sign Up y Login----*/
function validar($datos) {
  $errores = [];
  if (isset($datos["nombre"])) {
    $nombre = trim($datos["nombre"]);
    if (empty($nombre)) {
      $errores["nombre"] = "El campo nombre no puede estar vacío";
    } elseif (strlen($nombre) < 3) {
      $errores["nombre"] = "El campo nombre debe tener un mínimo de 3 caracteres";
    } elseif (!ctype_alpha($nombre)) {
      $errores["nombre"] = "El campo nombre no puede contener números";
    }
  }
  if (isset($datos["email"])) {
    $email = trim($datos["email"]);
    if (empty($email)) {
      $errores["email"] = "El campo email no puede estar vacío";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errores["email"] = "Debe ingresar un email válido";
    }
  }
  if (isset($datos["password"])) {
    $password = trim($datos["password"]);
    if (empty($password)){
      $errores["password"] = "El campo password no puede estar vacío";
    } elseif (strlen($password) < 6) {
      $errores["password"] = "El password debe tener un mínimo de 6 caracteres";
    }
  }
  if (isset($datos["repassword"])) {
    $repassword = trim($datos["repassword"]);
    if (empty($repassword)) {
      $errores["repassword"] = "Debe confirmar su contraseña";
    }
    if ($password != $repassword) {
      $errores["repassword"] = "Las contraseñas no coinciden";
    }
  }
  if (count($_FILES) != 0) {
    if ($_FILES["avatar"]["error"] != 0) {
      $errores["avatar"] = "El archivo no es válido";
    }
    $nombre = $_FILES["avatar"]["name"];
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);
    if ($ext != "jpg" && $ext != "png") {
      $errores["avatar"] = "Debe subir una imagen .jpg o .png";
    }
  }
  return $errores;
}

/*----Función de proceso de $_FILE----*/
function armarAvatar($imagen) {
  $nombre = $imagen["avatar"]["name"];
  $ext = pathinfo($nombre, PATHINFO_EXTENSION);
  $archivoOrigen = $imagen["avatar"]["tmp_name"];
  $archivoDestino = dirname(__DIR__);
  $archivoDestino = $archivoDestino . '/img/';
  $avatarUsuario = uniqid();
  $archivoDestino = $archivoDestino.$avatarUsuario.".".$ext;
  move_uploaded_file($archivoOrigen, $archivoDestino);
  $avatarUsuario = $avatarUsuario.".".$ext;
  return $avatarUsuario;
  }

function armarRegistro($datos, $imagen) {
  $usuario = [
    "nombre" => $datos["nombre"],
    "email" => $datos["email"],
    "password" => password_hash($datos["password"],PASSWORD_DEFAULT),
    "avatar" => $imagen
  ];
  return $usuario;
}

function guardarUsuario($usuario) {
  $jsusuario = json_encode($usuario);
  file_put_contents('usuarios.json', $jsusuario. PHP_EOL, FILE_APPEND);
}

function inputUsuario($campo) {
    if (isset($_POST[$campo])) {
        return $_POST[$campo];
    }
}

function abrirBaseDatos() {
    $baseDatosUsuarios = [];
    $datosjson = file_get_contents("usuarios.json");
    $datosjson = explode(PHP_EOL,$datosjson);
    array_pop($datosjson);
    foreach ($datosjson as $usuario) {
        $baseDatosUsuarios[] = json_decode($usuario,true);
    }
    return $baseDatosUsuarios;
}

function buscarEmail($email) {
    $baseDatosUsuarios = abrirBaseDatos();
    foreach ($baseDatosUsuarios as $usuario) {
        if ($usuario["email"] == $email) {
            return $usuario;
        }
    }
    return null;
}

function buscarNombreEmail($email, $nombre) {
    $baseDatosUsuarios = abrirBaseDatos();
    foreach ($baseDatosUsuarios as $usuario) {
      if ($nombre == $usuario["nombre"] && $email == $usuario["email"]) {
          return $usuario;
        }
      }
    return $usuario = null;
}

function armarRegistroOlvide($datos) {
    $usuarios = abrirBaseDatos();
    foreach ($usuarios as $key=>$usuario) {
      if ($datos["email"] == $usuario["email"]) {
          $usuario["password"] = password_hash($datos["password"],PASSWORD_DEFAULT);
            $usuarios[$key] = $usuario;
        }
        $usuarios[$key] = $usuario;
    }
    //Esto se los coloque para que sepan que con esta función podemos borrar un archivo
    unlink("usuarios.json");
    foreach ($usuarios as $usuario) {
        $jsusuario = json_encode($usuario);
        file_put_contents('usuarios.json', $jsusuario. PHP_EOL,FILE_APPEND);
    }
}

function crearSesion($usuario, $datos) {
  $_SESSION["nombre"] = $usuario["nombre"];
  $_SESSION["email"] = $usuario["email"];
  $_SESSION["avatar"] = $usuario["avatar"];
  if (isset($datos["recordar"])) {
    setcookie("email", $datos["email"], time()+60*60*2);
    setcookie("password", $datos["password"], time()+60*60*2);
  }
}

function validarUsuario() {
    if ($_SESSION["email"]) {
        return true;
    } elseif ($_COOKIE["email"]) {
        $_SESSION["email"] = $_COOKIE["email"];
        return true;
    } else {
        return false;
    }
}

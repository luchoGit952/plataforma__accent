<?php 
include'conexion/conexion-db-accent.php';
session_start();
if(!isset($_SESSION['id_conductor'])){
  header("Location: ./login-conductor");
  die();
}
$consulta__datos__conductor = "SELECT *  FROM conductores   WHERE email = '{$_SESSION['id_conductor']}' LIMIT 1";
$resultado__consulta = mysqli_query($conexion__db__accent,$consulta__datos__conductor);
if(mysqli_num_rows($resultado__consulta) > 0){
$datos__resultado = mysqli_fetch_array($resultado__consulta); 

 }
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página web AlexCG Design</title>
    <link rel="stylesheet" href="./css/app.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" type="image/ico" href="./img/favicon.ico"/>
</head>

<body>
    <header class="hero">
        <nav class="nav__hero">
            <div class="container nav__container">
                <div class="logo">
                    <a href="./dashboard-conductor"><img src="./img/logo__accent.png" alt="" class="logo__accent"></a>
                </div>


                <div class="enlaces__varios">
                   <a href="./perfil-conductor" class="enlace__perfil__usuario"><img src="upload/<?php echo $datos__resultado['avatar'] ?>" alt="" class="avatar__perfil"></a> 
                    <label class="btn btn-open" for="nav" id="abrir-menu"><i class="fab fa-creative-commons-nd btn__abrir__menu"></i></label> 
                    <div>
                    </div>
               </div>
        </nav>
    </header>
    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" id="cerrar-menu"><i class="fas fa-times"></i></a>
        <div class="overlay-content">
         <div class="contenedor__enalces__menu__home"><a href="./perfil-conductor" class="enlaces__menu__home"><img src="upload/<?php echo $datos__resultado['avatar'] ?>" alt="" class="avatar__perfil"><div class="item__nombre"><?php echo $datos__resultado['nombre_conductor'] ?></div></a></div>
           <div class="contenedor__enalces__menu__home"><a href="./dashboard-conductor" class="enlaces__menu__home"> <i class="fas fa-home"></i> Home</a></div> 
           <div class="contenedor__enalces__menu__home"><a href="./historial-conductor" class="enlaces__menu__home"><i class="fas fa-history"></i> Historial</a></div> 
           <div class="contenedor__enalces__menu__home"><a href="./configuracion-conductor?id=<?php  echo $datos__resultado['id_conductor'] ?>" class="enlaces__menu__home"><i class="fas fa-cogs"></i> Configuracion</a></div> 
           <div class="contenedor__enalces__menu__home"><a href="./perfil-conductor" class="enlaces__menu__home"><i class="fas fa-comments"></i> Reseñas</a></div> 
            <div class="contenedor__enalces__menu__home"><a href="./desconectar-conductor" class="enlaces__menu__home"><i class="fas fa-power-off"></i> Desconectarse</a></div>
        </div>

    </div>

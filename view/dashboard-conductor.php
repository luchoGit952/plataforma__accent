<?php  include'layout/nav-home-conductor.php ';
include'conexion/conexion-db-accent.php';
$consulta__datos__conductor = "SELECT *  FROM conductores   WHERE email = '{$_SESSION['id_conductor']}' LIMIT 1";
$resultado__consulta = mysqli_query($conexion__db__accent,$consulta__datos__conductor);
if(mysqli_num_rows($resultado__consulta) > 0){
  $datos__resultado = mysqli_fetch_array($resultado__consulta); 

 }?>

<div class="container contenedor__dashboard">
    <h2 class="vista__nombre__usuario">Hola <?php echo $datos__resultado['nombre_conductor'] ?></h2>
    <div class="contenedor__cards__dashboard">
        <a href="./saldo" class="cards__dashboard animate__animated  animate__bounceInDown">
            <div>
                <p class="item__titulo__cards"><i class="fas fa-coins"></i> Tu saldo</p>
                <h2 class="item__total">0.00</h2>
                <span class="item__disponible">Disponible</span>
            </div>
        </a>
        <a href="./historial-conductor"  class="cards__dashboard animate__animated  animate__bounceInDown">
            <div>
                <p class="item__titulo__cards"><i class="fab fa-creative-commons-zero"></i> Total servicos</p>
                <h2 class="item__total">0</h2>
            </div>
        </a>

        <a href="./servicio-completado" class="cards__dashboard animate__animated  animate__bounceInDown">
            <div>
            <p class="item__titulo__cards"><i class="fas fa-thumbs-up"></i> Servicios completados</p>
            <h2 class="item__total">0</h2>
            </div>
        </a>

        <a href="./servicio-cancelado" class="cards__dashboard animate__animated  animate__bounceInDown">
            <div>
            <p class="item__titulo__cards"><i class="fas fa-bell-slash"></i> Servicios cancelados</p>
            <h2 class="item__total">0</h2>
            </div>
        </a>

        <a href="./notificaciones" class="cards__dashboard nuevo__servicio animate__animated  animate__bounceInDown">
        <div>
                <p class="item__titulo__cards"><i class="fas fa-plus"></i> Nuevo servicio</p>
                <span class="nueva__notificacion">1</span>
                </div>
            </a>

    </div>

</div>

<?php  include'layout/footer-home.php' ?>
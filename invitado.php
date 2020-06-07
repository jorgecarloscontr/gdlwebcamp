<?php 
    include_once 'includes/templates/header.php';
?>

<section class="invitados contenedor seccion">
    <?php
        try{
            require_once('includes/funciones/db_conexion.php');
            $sql = "SELECT * FROM invitados ";
            $resultado = $conn->query($sql);
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    ?>
    <h2>Nuestros invitados</h2>
    <ul class="lista-invitados clearfix">
        <?php while($invitado = $resultado->fetch_assoc()){ ?>
            <li>
                <div class="invitado">
                    <img src="img/img/<?php echo $invitado['url_imagen']; ?>" alt="imagen invitado">
                    <p><?php echo $invitado['nombre_invitado'] . $invitado['apellido_invitado']?></p>
                </div>
            </li>
        <?php } ?><!-- Acomodar los registros por fechas-->
    </ul>             
</section>

<?php 
  include_once 'includes/templates/footer.php';
?>

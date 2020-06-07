<?php 
    include_once 'includes/templates/header.php';
?>

  <section class="seccion contenedor">
    <h2>Calendario de eventos</h2>
    <?php
        try{
            require_once('includes/funciones/db_conexion.php');
            $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, icono, cat_evento, nombre_invitado, apellido_invitado ";
            $sql .= " FROM eventos ";
            $sql .= " INNER JOIN categoria_evento ";
            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
            $sql .= " INNER JOIN invitados ";
            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
            $sql .= " ORDER BY evento_id ";

            $resultado = $conn->query($sql);
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    ?>
    <div class="calendario">
        <?php $calendario = array();
        while($eventos = $resultado->fetch_assoc()){
            $fecha = $eventos['fecha_evento'];
            $evento = array(
                'titulo' => $eventos['nombre_evento'],
                'fecha' => $eventos['fecha_evento'],
                'hora' => $eventos['cat_evento'],
                'icono' => $eventos['icono'],
                'categoria' => $eventos['cat_evento'],
                'invitado' => $eventos['nombre_invitado'] . " " .$eventos['apellido_invitado']
            );
            $calendario[$fecha][] = $evento;
        } ?><!-- Acomodar los registros por fechas-->

        <?php   foreach($calendario as $dia => $lista_evento) {?>
            <h3>
                <i class="fa fa-calendar"></i>
                <?php
                    //Unix
                    //setlocale(LC_TIME, 'es_ES-UTF-8');
                    //windows
                    //setlocale(LC_TIME, 'spanish');
                    
                    //echo utf8_encode(strftime( "%A, %d de %B del %Y",strtotime($dia))); 
                    echo utf8_encode(strftime( "%Y-%m-%d",strtotime($dia))); 
                ?>
            </h3>
            <div class="card-calendario">
                <?php foreach($lista_evento as $evento){?>
                    <div class="dia">
                        <p class="titulo"><?php echo $evento['titulo']; ?></p>
                        <p class="hora">
                            <i class="fas fa-clock" aria-hidden="true"></i>
                            <?php echo $evento['fecha'] . " " .$evento['hora']; ?>
                        </p>
                        <p>
                            <i class="fas <?php echo $evento['icono']; ?>" aria-hidden="true"></i>
                            <?php echo $evento['categoria']; ?>
                        </p>
                        <p>
                            <i class="fas fa-user" aria-hidden = "true"></i>
                            <?php echo $evento['invitado']; ?>

                        </p>
                    </div>
                <?php }?>
            </div>

        <?php } ?><!--Obtener los dias y los eventos correspondientes-->

        
    </div><!--calendario -->
    <pre>
        <?php
            var_dump($calendario);
        ?>
    </pre>

    <?php
        $conn->close();
    ?>
  </section>

<?php 
  include_once 'includes/templates/footer.php';
?>

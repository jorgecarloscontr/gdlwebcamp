  <?php 
    include_once 'includes/templates/header.php';
  ?>

  <section class="seccion contenedor">
    <h2>La mejor conferencia de diseño web</h2>
    <p>
      asdfasfsdfsdfsfdfs djfghh sdfg huiyh jks lfghjs uiwrt hljkfdh gklhjs usihuhgl ksghjkfh ljkhskljhfg lkjhk huii kldsgjkh98 iuryt lksdjhg
    </p>

  </section>
  <section class="programa">
    <div class="contenedor-video">
      <video autoplay loop poster="img/img/bg-talleres.jpg">
        <source src="video/video.mp4" type="video/mp4">
        <source src="video/video.webm" type="video/webm">
        <source src="video/video.ogv" type="video/ogv">
      </video>
    </div>
    <div class="contenido-programa">
      <div class="contenedor">
        <div class="programa-evento">
          <h2>Programa del evento</h2>
          <?php
            try{
                require_once('includes/funciones/db_conexion.php');
                $sql = "SELECT * FROM categoria_evento";
                $resultado = $conn->query($sql);
            }catch(\Exception $e){
                echo $e->getMessage();
            }
          ?>
          <nav class="menu-programa">
            <?php while($categoria = $resultado->fetch_array(MYSQLI_ASSOC)){?>
              <?php $nombre = $categoria['cat_evento']; 
              ?>
              <a href="#<?php echo strtolower($nombre)?>"><i class="fas <?php echo $categoria['icono'] ?>" aria-hidden="true"></i><?php echo $nombre ?></a>
            <?php } ?>
          </nav>
          <?php
            try{
                require_once('includes/funciones/db_conexion.php');
                $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, icono, cat_evento, nombre_invitado, apellido_invitado ";
                $sql .= " FROM eventos ";
                $sql .= " INNER JOIN categoria_evento ";
                $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= " INNER JOIN invitados ";
                $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                $sql .= " AND eventos.id_cat_evento = 1 ";
                $sql .= " ORDER BY 'evento_id' LIMIT 2; ";
                $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, icono, cat_evento, nombre_invitado, apellido_invitado ";
                $sql .= " FROM eventos ";
                $sql .= " INNER JOIN categoria_evento ";
                $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= " INNER JOIN invitados ";
                $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                $sql .= " AND eventos.id_cat_evento = 2 ";
                $sql .= " ORDER BY 'evento_id' LIMIT 2; ";
                $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, icono, cat_evento, nombre_invitado, apellido_invitado ";
                $sql .= " FROM eventos ";
                $sql .= " INNER JOIN categoria_evento ";
                $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= " INNER JOIN invitados ";
                $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                $sql .= " AND eventos.id_cat_evento = 3 ";
                $sql .= " ORDER BY 'evento_id' LIMIT 2; ";
    
            }catch(\Exception $e){
                echo $e->getMessage();
            }
          ?>

          <?php 
            $conn->multi_query($sql);
            do{
              $resultado = $conn->store_result();
              $row = $resultado->fetch_all(MYSQLI_ASSOC); 
              $bandera = true;
              foreach($row as $evento){
                if($bandera == true){ ?>
                    <div id="<?php echo strtolower($evento['cat_evento']); ?>" class="info-curso ocultar clearfix">
                <?php 
                    $bandera=false;
                } ?>

                <div class="detalle-evento">
                  <h3><?php echo $evento['nombre_evento'];?></h3>
                  <p><?php echo $evento['hora_evento'];?> hrs</p>
                  <p><?php echo $evento['fecha_evento'];?></p>
                  <p><?php echo $evento['nombre_invitado']. " " .$evento['apellido_invitado'];?></p>
                </div>


              <?php }
              $resultado->free(); ?>
              <a href="calendario.php" class="button float-right">Ver todos</a>
              </div>
            <?php }while($conn->more_results() && $conn->next_result()); ?>
        </div>
      </div>
    </div>
  </section><!--Programa-->

  <section class="invitados contenedor seccion">
    <h2>Nuestros invitados</h2>
    <ul class="lista-invitados clearfix">
      <li>
        <div class="invitado">
          <img src="img/img/invitado1.jpg" alt="imagen invitado1">
          <p>Rafael Bautista</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/img/invitado2.jpg" alt="imagen invitado2">
          <p>Gabriela hernandez</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/img/invitado3.jpg" alt="imagen invitado3">
          <p>Mario saldaña</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/img/invitado4.jpg" alt="imagen invitado4">
          <p>Sofia alvarez</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/img/invitado5.jpg" alt="imagen invitado5">
          <p>carlos rivera</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/img/invitado6.jpg" alt="imagen invitado6">
          <p>Susan sanchez</p>
        </div>
      </li>
    </ul>
  </section>

  <div class="contador parallax">
    <div class="contenedor">
      <ul class="resumen-evento clearfix">
          <li><p class="numero"></p>invitados</li>
          <li><p class="numero"></p>talleres</li>
          <li><p class="numero"></p>dias</li>
          <li><p class="numero"></p>conferencias</li>
        </ul>
    </div>
  </div>

  <section class="precios seccion">
    <h2>Precios</h2>
    <div class="contenedor">
      <ul class="lista-precios clearfix">
        <li>
          <div class="tabla-precio">
            <h3>pase por dia</h3>
            <p class="numero">$30</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
            <a href="#" class="button hollow">Comprar</a>
          </div>
        </li>
        <li>
          <div class="tabla-precio">
            <h3>Todos los dias</h3>
            <p class="numero">$50</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
            <a href="#" class="button">Comprar</a>
          </div>
        </li>
        <li>
          <div class="tabla-precio">
            <h3>pase por dos dia</h3>
            <p class="numero">$45</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
            <a href="#" class="button hollow">Comprar</a>
          </div>
        </li>
      </ul>
    </div>
  </section>
  <div class="mapa" id="mapa"></div>

  <section class="seccion">
    <h2>Testimoniales</h2>
    <div class="testimoniales contenedor clearfix">
      <div class="testimonial">
        <blockquote>
          <p>sed mollis velit sit amet felis condimentum ultrices. fusce vehiculo ut sem vitae semper. null sdfasdf sdg gjior oituioer t jlfdkjglkdfgj lkjlkgfdj giou oidfg jklj df</p>
          <footer class="info-testimonial clearfix">
            <img src="img/img/testimonial.jpg" alt="imagen testimoniales">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div><!--testimonial-->
      <div class="testimonial">
        <blockquote>
          <p>sed mollis velit sit amet felis condimentum ultrices. fusce vehiculo ut sem vitae semper. null sdfasdf sdg gjior oituioer t jlfdkjglkdfgj lkjlkgfdj giou oidfg jklj df</p>
          <footer class="info-testimonial clearfix">
            <img src="img/img/testimonial.jpg" alt="imagen testimoniales">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div><!--testimonial-->
      <div class="testimonial">
        <blockquote>
          <p>sed mollis velit sit amet felis condimentum ultrices. fusce vehiculo ut sem vitae semper. null sdfasdf sdg gjior oituioer t jlfdkjglkdfgj lkjlkgfdj giou oidfg jklj df</p>
          <footer class="info-testimonial clearfix">
            <img src="img/img/testimonial.jpg" alt="imagen testimoniales">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div><!--testimonial-->
    </div>
    <div class="newsletter parallax">
      <div class="contenido contenedor">
        <p>registrete al newsletter: </p>
        <h3>gdlwebcamp</h3>
        <a href="#" class="button transparente">Registro</a>
      </div>
    </div><!--newsletter-->
  </section>
  <section class="seccion">
    <h2>Faltan</h2>
    <div class="cuenta-regresiva" id="cuenta-regresiva">
      <ul class="clearfix contenedor">
        <li><p id="dias" class="numero"></p> dias</li>
        <li><p id="horas" class="numero"></p>horas</li>
        <li><p id="minutos" class="numero"></p>minutos</li>
        <li><p id="segundos" class="numero"></p>segundos</li>
      </ul>
    </div>
  </section>
<?php 
  include_once 'includes/templates/footer.php';
?>

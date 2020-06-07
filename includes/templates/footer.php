<footer class="site-footer">
    <div class="contenedor clearfix">
      <div class="footer-informacion">
        <h3>Sobre <span>gdlwebcamp</span></h3>
        <p>praesent rutrum efficitur pharetra praesent rutrum efficitur pharetra praesent rutrum efficitur pharetra praesent rutrum efficitur pharetrapraesent rutrum efficitur pharetra</p>
      </div>
      <div class="ultimos-tweets">
        <h3>Sobre <span>gdlwebcamp</span></h3>
        <ul>
          <li>rutrum efficitur pharetra praesent rutrum efficitur pharetrapraesent rutrum efficitur pharetra</li>
          <li>rutrum efficitur pharetra praesent rutrum efficitur pharetrapraesent rutrum efficitur pharetra</li>
          <li>rutrum efficitur pharetra praesent rutrum efficitur pharetrapraesent rutrum efficitur pharetra</li>
        </ul>
      </div>
      <div class="menu">
        <h3>Redes <span>sociales</span></h3>
        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-pinterest-p"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </nav>
      </div>
    </div>
    <p class="copyright"> Todos los derechos Reservados GDLWEBCAMP 2018</p>
  </footer>




  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>

  <?php
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace('.php','',$archivo);
    if($pagina == 'invitados'){
      echo '<script src="js/lightbox-plus-jquery.min.js"></script>';
    }else{
      echo '<script src="js/lightbox-plus-jquery.min.js"></script>';
    }
  ?>
  <script src="js/lightbox-plus-jquery.min.js"></script>
  <script src="js/vendor/jquery.animateNumber.min.js"></script>
  <script src="js/vendor/jquery.countdown.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>


  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>

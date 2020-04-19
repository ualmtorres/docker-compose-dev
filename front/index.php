<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Calificaciones</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/album/">

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.3/examples/album/album.css" rel="stylesheet">
  </head>
  <body>
    <header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center">
       <strong>Calificaciones</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Calificaciones</h1>
      <p class="lead text-muted">Listado de calificaciones provisionales. Como podrás observar, esto es sólo una demostración</p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
    <?php
       // create curl resource
        $ch = curl_init();
        $url = "calificaciones-api/calification";
 
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
 
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
        // $output contains the output string
        $output = json_decode(curl_exec($ch), true);

        // Get HTTP status code
        $statusCode = curl_getinfo ($ch, CURLINFO_HTTP_CODE );

        if ($statusCode == 200) {
          foreach ($output['result'] as $student) {
            $id = $student['id'];
            echo '<div class="card" style="width: 18;">';
            echo '<div class="card-body">';
            echo '  <h5>' . $student['student'] . '</h5>';
            echo '  <h6 class="card-text text-muted">Calificación: ' . $student['calification'] . '</h6>';
            echo '</div>';
            echo '</div>';
          }
        }

        // close curl resource to free up system resources
        curl_close($ch);  

?>
</div>
  </div>

</main>

<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Volver arriba</a>
    </p>
    <p>Aplicación de prueba para calificaciones</p>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script></body>
</html>

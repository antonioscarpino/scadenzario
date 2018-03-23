<?php

require_once("src/classi/class_Db.php");
if ($_GET) {
    $id = $_GET['id'];
    $descrizione = $_GET['descrizione'];
}

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scadenzario ver. 2.0</title>

    <!-- inializzazione bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- inializzazione css tempusdominus  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
    <!-- inializzazione css custom  -->
    <link rel="stylesheet" href="css/style_custom.css">

    <!-- inializzazione js per funzionamento tempusdominus  -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.js"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/locale/it.js"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script src="js/bootstrap-datepicker.it.min.js" charset="UTF-8"></script>

  </head>

  <body>
    <nav class="navbar navbar-fixed-top navbar-custom">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="https://www.saelettroimpianti.it">Scadenzario</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Home </a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>
    <div class="container">
      <div class="row">
        <form method="post">
          <div class="col-lg-10">
            <!-- <div class="input-group"> -->
            <label class="control-label" for="date">Descrizione </label>
            <input type="text" class="form-control" id="descrizione" name="descrizione" value="<?php if ($_GET) {
    echo $descrizione;
} ?>">
            <!-- </div> -->
          </div>
      </div><br>
      <label class="control-label" for="date">Priorità </label>
      <div class="row">
        <!-- <label class="control-label" for="date">Priorità </label><br> -->
        <div class="col-lg-6">
          <select id="className" name='className' required>
            <option selected value=""></option>
            <option value="success">Normale </option>
            <option value="important">Importante </option>
          </select>
        </div>
      </div>
      <hr>
      <div class="form-group">
        <button class="btn btn-danger" name="submit" type="submit" value="<?php echo $id ?>">Modifica</button>
      </div>
      </form>
    </div>

    <div class="container animated fadeInUp">
      <?php
//richiamo metodo inserimento scadenza
if ($_POST) {
    echo metodi_Db::mod_scadenza($_POST['submit'], $_POST['descrizione'], $_POST['className']);
}

?>
    </div>

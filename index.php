<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pizza</title>
    <style>
    </style>
  </head>
  <body>
    <?php
    include "ingredientes.php";
    include "funciones.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST')
      if(isset($_POST['ingredientes']))
        generarPedido($_POST['ingredientes']);
      else
        generarPedido();
    else
      generarFormulario();
    ?>
  </body>
</html>

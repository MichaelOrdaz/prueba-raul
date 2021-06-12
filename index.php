<?php

$mysql = new mysqli('127.0.0.1', 'admin', '12345', 'encuentas');

$result = $mysql->query("SELECT * FROM preguntas;");

$rows = [];

while($rows[] = $result->fetch_object());
array_pop($rows);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Encuestas</title>
</head>
<body>


<form method="POST" action="save.php">

  <label for="">id del trabajador</label>
  <input type="text" name="trabajador_id" />

  <hr>

  <?php 

    foreach ($rows as $row) {
      
      //por cada pregunta quiero hacer un input
      //pero dependiendiendo el tipo de pregunta y las respuestas puede ser un radio o un input text

      echo "<label>{$row->pregunta}</label> <br>";
      if ($row->tipo === 'abierta') {
        //dibujar un input texto
        if ($row->respuestas === '') {
          echo "<input type='text' name='respuesta[{$row->id}]' placeholder='ingresa tu respuesta' required />";
        } else {
          $respuestas = json_decode($row->respuestas);
          foreach ($respuestas as $respuesta) {
            echo "<input type='radio' name='respuesta[{$row->id}]' value='{$respuesta}' required />";
            echo $respuesta;
            echo "<br>";
          }

        }
        
      } else {
        //dibujamos radio
        $respuestas = json_decode($row->respuestas);
        foreach ($respuestas as $respuesta) {
          echo "<input type='radio' name='respuesta[{$row->id}]' value='{$respuesta}' required />";
          echo $respuesta;
          echo "<br>";
        }

      }


      echo "<hr>";

    }




  ?>

  <button type="submit">Enviar formulario</button>

</form>

</body>
</html>
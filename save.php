<?php
$mysql = new mysqli('127.0.0.1', 'admin', '12345', 'encuentas');

$trabajador_id = $_POST['trabajador_id'];


foreach ($_POST['respuesta'] as $key => $respuesta) {
  $mysql->query("INSERT INTO respuestas(respuesta, trabajador_id, pregunta_id) VALUES
  ('{$respuesta}', '{$trabajador_id}', '{$key}')");
}

echo "SE inserto correcatmente";
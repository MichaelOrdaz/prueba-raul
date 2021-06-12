<?php
$mysql = new mysqli('127.0.0.1', 'admin', '12345', 'encuentas');


$mysql->query("INSERT INTO trabajadores (nombre, numero_empleado) VALUES
  ('{$_GET['nombre']}', '{$_GET['numero']}')");

echo "SE inserto correcatmente";
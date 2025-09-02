<?php
require '../../includes/config/database.php';
$db = conectarDB();
$query = "SELECT COUNT(*) as total FROM propiedades";
$resultado = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($resultado);
echo $row['total'];

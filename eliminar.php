<?php
    $data = file_get_contents("php://input");
    require "conexion.php";
    $query = $pdo->prepare("DELETE FROM viaje WHERE id = :id");
    $query->bindParam(":id", $data);
    $query->execute();
    echo "ok";
?>
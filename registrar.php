<?php
if (isset($_POST)) {
    $codigo = $_POST['codigo'];
    $destino = $_POST['destino'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    require("conexion.php");
    if (empty($_POST['idp'])){
        $query = $pdo->prepare("INSERT INTO viaje (codigo, destino, precio, cantidad) VALUES (:cod, :des, :pre, :cant)");
        $query->bindParam(":cod", $codigo);
        $query->bindParam(":des", $destino);
        $query->bindParam(":pre", $precio);
        $query->bindParam(":cant", $cantidad);
        $query->execute();
        $pdo = null;
        echo "ok";
    }else{
        $id = $_POST['idp'];
        $query = $pdo->prepare("UPDATE viaje SET codigo = :cod, destino =des, precio =:pre, cantidad = :cant WHERE id = :id");
        $query->bindParam(":cod", $codigo);
        $query->bindParam(":des", $destino);
        $query->bindParam(":pre", $precio);
        $query->bindParam(":cant", $cantidad);
        $query->bindParam("id", $id);
        $query->execute();
        $pdo = null;
        echo "modificado";
    }
    
}

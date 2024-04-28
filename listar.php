<?php
$data = file_get_contents("php://input");
require "conexion.php";
$consulta = $pdo->prepare("SELECT * FROM viaje ORDER BY id DESC");
$consulta->execute();
if ($data != "") {
    $consulta = $pdo->prepare("SELECT * FROM viaje WHERE id LIKE '%".$data."%' OR destino LIKE '%".$data."%' OR precio LIKE '%".$data."%'");
    $consulta->execute();
}
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
foreach ($resultado as $data) {
    echo "<tr>
            <td>" . $data['id'] . "</td>
            <td>" . $data['destino'] . "</td>
            <td>" . $data['precio'] . "</td>
            <td>" . $data['cantidad'] . "</td>
            <td>
                <button type='button' class='btn btn-success' onclick=Editar('" . $data['id'] . "')>Editar</button>
                <button type='button' class='btn btn-danger' onclick=Eliminar('" . $data['id'] . "')>Eliminar</button>
            </td>        
        </tr>";
}

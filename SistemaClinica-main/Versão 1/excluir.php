<?php
    require 'conexao.php';
    $id_paciente = $_REQUEST ["id_paciente"];

    $sql = $pdo->prepare ("DELETE FROM Consultas WHERE id_paciente = :id_paciente");
    $sql-> bindValue (":id_paciente", $id_paciente);
    $sql->execute();

    header("Location: Consultas.php");
?>
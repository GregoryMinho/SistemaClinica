<?php
    require 'conexao.php';
    $id_paciente = $_POST['id_paciente'];

    $sql = $pdo->prepare ("DELETE FROM Medicamentos WHERE id_paciente = :id_paciente");
    $sql-> bindValue (":id_paciente", $id_paciente);
    $sql->execute();

    echo "Registro excluído com sucesso!";
    echo "<br><a href='index.php'>Voltar para a tabela</a>";
?>
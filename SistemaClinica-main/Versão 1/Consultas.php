<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas Agendadas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
    require 'conexao.php'
    ?>

    <?php
    $sql = $pdo->query("SELECT * FROM Pacientes");

    $lista = [];
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <h1 class="text-center mt-5 mb-5">Consultas Agendadas</h1>

    <div class="container">
        <form action="" method="get">
            <div class="form-group">
                <label for="nome_paciente">Pesquisar por nome:</label>
                <input type="text" class="form-control" id="nome_paciente" name="nome_paciente" placeholder="Digite o nome do paciente">
                <br>
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
        </form>

        <?php
        if (isset($_GET['nome'])) {
            $nome = $_GET['nome'];
            $sql = $pdo->prepare("SELECT * FROM Consultas WHERE nome LIKE ?");
            $sql->execute(["%{$nome}%"]);
            $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = $pdo->prepare("SELECT * FROM Consultas");
            $sql->execute();
            $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>

        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID PACIENTE</th>
                    <th scope="col">NOME PACIENTE</th>
                    <th scope="col">EMAIL PACIENTE</th>
                    <th scope="col">TELEFONE PACIENTE</th>
                    <th scope="col">DATA CONSULTA</th>
                    <th scope="col">HORA CONSULTA</th>
                    <th scope="col">NOME MEDICO</th>
                    <th scope="col">ESPECIALIDADE</th>
                    <th scope="col">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $dados) : ?>
                    <tr>
                        <td><?php echo $dados['id_paciente']; ?></td>
                        <td><?php echo $dados['nome_paciente']; ?></td>
                        <td><?php echo $dados['email_paciente']; ?></td>
                        <td><?php echo $dados['telefone_paciente']; ?></td>
                        <td><?php echo $dados['data_consulta']; ?></td>
                        <td><?php echo $dados['hora_connsulta']; ?></td>
                        <td><?php echo $dados['nome_medico']; ?></td>
                        <td><?php echo $dados['especialidade']; ?></td>
                        <td>
                            <a href="excluir.php?id_paciente=<?= $dados['id_paciente']; ?>" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="menuADM.php" class="btn btn-primary">Voltar ao Menu</a>
    </div>
</body>

</html>
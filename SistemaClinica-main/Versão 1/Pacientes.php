<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes Cadastrados</title>
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

    <h1 class="text-center mt-5 mb-5">Pacientes Cadastrados</h1>

    <div class="container">
        <form action="" method="get">
            <div class="form-group">
                <label for="nome">Pesquisar por nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do paciente">
                <br>
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
        </form>

        <?php
        if (isset($_GET['nome'])) {
            $nome = $_GET['nome'];
            $sql = $pdo->prepare("SELECT * FROM Pacientes WHERE nome LIKE ?");
            $sql->execute(["%{$nome}%"]);
            $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = $pdo->prepare("SELECT * FROM Pacientes");
            $sql->execute();
            $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>

        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">NASCIMENTO</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">TELEFONE</th>
                    <th scope="col">ENDEREÇO</th>
                    <th scope="col">SEXO</th>
                    <th scope="col">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $dados) : ?>
                    <tr>
                        <td><?php echo $dados['id']; ?></td>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['data_nascimento']; ?></td>
                        <td><?php echo $dados['email']; ?></td>
                        <td><?php echo $dados['telefone']; ?></td>
                        <td><?php echo $dados['endereco']; ?></td>
                        <td><?php echo $dados['sexo']; ?></td>
                        <td>
                            <a href="excluir2.php?id=<?= $dados['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="menuADM.php" class="btn btn-primary">Voltar ao Menu</a>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pacientes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <?php
    require 'conexao.php'
    ?>

    <div class="container">
        <h1 class="text-center">Cadastro de Pacientes</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="nome">Nome do Paciente:</label>
                <input type="text" class="form-control" id="nome" name="nome" require>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="text" class="form-control" id="data_nascimento" name="data_nascimento">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="number" class="form-control" id="telefone" name="telefone" maxlength="11">
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" id="endereco" name="endereco">
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select class="form-control" id="sexo" name="sexo">
                    <option value="">Selecione uma opção</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="otro">Outro</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="Cadastrar">Cadastrar</button>
        </form>
    </div>

    <?php
    if (isset($_POST['Cadastrar'])) {
        $nome = $_POST['nome'];
        $data_nascimento = $_POST['data_nascimento'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $sexo = $_POST['sexo'];

        $sql = $pdo->prepare("INSERT INTO Pacientes (nome, data_nascimento, email, telefone, endereco, sexo) VALUES (?, ?, ?, ?, ?, ?)");
        $sql->execute([$nome, $data_nascimento, $email, $telefone, $endereco, $sexo]);

        header("Location: CadastroPaciente.php");
        exit;
    } else {
    }
    ?>

</body>

</html>
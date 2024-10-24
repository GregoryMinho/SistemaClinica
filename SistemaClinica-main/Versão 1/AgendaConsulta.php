<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Agendar Consulta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

    <?php
    require 'conexao.php'
    ?>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Agendar Consulta</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="nome_paciente">Nome do Paciente:</label>
                <input type="text" id="nome_paciente" name="nome_paciente" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email_paciente">Email do Paciente:</label>
                <input type="email" id="email_paciente" name="email_paciente" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telefone_paciente">Telefone do Paciente:</label>
                <input type="number" id="telefone_paciente" name="telefone_paciente" class="form-control" maxlength="11">
            </div>
            <div class="form-group">
                <label for="data_consulta">Data da Consulta:</label>
                <input type="date" id="data_consulta" name="data_consulta" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="hora_consulta">Hora da Consulta:</label>
                <input type="time" id="hora_consulta" name="hora_consulta" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nome_medico">Nome do Médico:</label>
                <input type="text" id="nome_medico" name="nome_medico" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="especialidade">Especialidade:</label>
                <input type="text" id="especialidade" name="especialidade" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary" name="Agendar">Agendar</button>
        </form>
    </div>
    
    <?php
    if (isset($_POST['Agendar'])) {
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
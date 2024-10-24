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
    <div class="container mt-5 mb-5">
        <h1 class="text-center">Agendar Consultas</h1>
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
            <a href="menuPaciente.php" class="btn btn-secondary">Voltar ao Menu</a>
        </form>
    </div>
    
    <?php
    if (isset($_POST['Agendar'])) {
        $nome_paciente = $_POST['nome_paciente'];
        $email_paciente = $_POST['email_paciente'];
        $telefone_paciente = $_POST['telefone_paciente'];
        $data_consulta = $_POST['data_consulta'];
        $hora_consulta = $_POST['hora_consulta'];
        $nome_medico = $_POST['nome_medico'];
        $especialidade = $_POST['especialidade'];

        $sql = $pdo->prepare("INSERT INTO Consultas (nome_paciente, email_paciente, telefone_paciente, data_consulta, hora_connsulta, nome_medico, especialidade) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sql->execute([$nome_paciente, $email_paciente, $telefone_paciente, $data_consulta, $hora_consulta, $nome_medico, $especialidade]);

        header("Location: AgendaConsulta.php");
        exit;
    } else {
    }
    ?>
</body>

</html>
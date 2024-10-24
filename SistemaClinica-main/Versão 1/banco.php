<?php
    require 'conexao.php';

    $id =  $_POST['id'];
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];  
    $email =  $_POST['email'];
    $telefone = $_POST['telefone']; 
    $endereco = $_POST['endereco']; 
    $sexo =  $_POST['sexo']; 

    if ($id && $nome &&  $data_nascimento && $email && $telefone && $endereco && $sexo) {
        $sql = $pdo->prepare("INSERT INTO Pacientes (id, nome, data_nascimento, email, telefone, endereco, sexo)");
        $sql->bindValue(':id', $id);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':data_nascimento', $data_nascimento);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':endereco', $endereco);
        $sql->bindValue(':sexo', $sexo);

        if ($sql->execute()) {
            header("Location: CadastroPaciente.php");
        }
        else {
            echo  "Erro ao cadastrar paciente";
        }
    }
?>

<?php
    require 'conexao.php';

    $id_paciente =  $_POST['id_paciente'];
    $nome_paciente = $_POST['nome_paciente'];
    $email_paciente = $_POST['email_paciente'];  
    $telefone_paciente =  $_POST['telefone_paciente'];
    $data_consulta = $_POST['data_consulta']; 
    $hora_connsulta = $_POST['hora_connsulta']; 
    $nome_medico =  $_POST['nome_medico']; 
    $especialidade =  $_POST['especialidade']; 

    if ($id_paciente && $nome_paciente && $email_paciente && $telefone_paciente && $data_consulta && $hora_connsulta && $nome_medico && $especialidade) {

        $sql = $pdo->prepare("INSERT INTO Consultas (id_paciente, nome_paciente, email_paciente, email, telefone, endereco, sexo)");
        $sql->bindValue(':id_paciente', $id_paciente);
        $sql->bindValue(':nome_paciente', $nome_paciente);
        $sql->bindValue(':email_paciente', $email_paciente);
        $sql->bindValue(':telefone_paciente', $telefone_paciente);
        $sql->bindValue(':data_consulta', $data_consulta);
        $sql->bindValue(':hora_connsulta', $hora_connsulta);
        $sql->bindValue(':nome_medico', $nome_medico);
        $sql->bindValue(':especialidade', $especialidade);

        if ($sql->execute()) {
            header("Location: AgendaConsulta.php");
        }
        else {
            echo  "Erro ao agendar consulta";
        }
    }
?>
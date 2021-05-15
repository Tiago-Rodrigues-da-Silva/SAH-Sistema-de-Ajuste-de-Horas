<?php

    require 'conexao.php';
    require 'Utilitarios.php';
    session_start();

    function adicionar($data, $horaEntrada, $horaSaida, $justificativa, $id_usuario){
        global $pdo;
 
        $sql = "INSERT INTO tbhoras (data, entrada, saida, justificativa, id_usuario)
        VALUES (:data, :entrada, :saida, :justificativa, :id_usuario)";
        $sql = $pdo->prepare($sql);

        $sql->bindParam(':data', $data);
        $sql->bindParam(':entrada', $horaEntrada);
        $sql->bindParam(':saida', $horaSaida);
        $sql->bindParam(':justificativa', $justificativa);
        $sql->bindParam(':id_usuario', $id_usuario);

        $sql->execute();
        header("Location: inserirAjusteTrabalhador.php");
    }

    $data = toDateSql($_POST['data']);
    $horaEntrada = $_POST['horaEntrada'];
    $horaSaida = $_POST['horaSaida'];
    switch ($_POST['justificativa']) {
        case 'prodConteudo':
            $justificativa = "Prod. Conteúdo";
            break;
        case 'versionamento':
            $justificativa = "Versionamento";
            break;
        case 'capacitacao':
            $justificativa = "Capacitação";
            break;
        case 'emprestimo':
            $justificativa = "Empréstimo";
            break;
    }
 
    $id_usuario = $_SESSION['id_usuario'];
    
    //chama a função que efetivamente registra no banco de dados
    adicionar($data, $horaEntrada, $horaSaida, $justificativa, $id_usuario);

?>
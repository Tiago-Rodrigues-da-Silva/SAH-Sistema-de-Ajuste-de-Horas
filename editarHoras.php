<?php

    require 'conexao.php';
    require 'Utilitarios.php';
    session_start();

    function editar($registro, $id_horas){
        global $pdo;
 
        $sql = "UPDATE tbhoras SET data=:data, entrada=:entrada, saida=:saida, 
        justificativa=:justificativa WHERE id_horas = '$id_horas'";
        $sql = $pdo->prepare($sql);
        $sql->execute($registro);
        header("Location: editarAjusteTrabalhador.php");
    }

    $id_horas = $_POST['id_horas'];
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
    

    $registro = [        
        'data' => $data,
        'entrada' => $horaEntrada,
        'saida' => $horaSaida,
        'justificativa' => $justificativa,
    ];
    
    //chama a função que efetivamente registra no banco de dados
    editar($registro, $id_horas);

?>
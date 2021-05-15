<?php
require 'conexao.php';
//excluir horas
    session_start();
    $id_horas = $_GET['id_horas'];
    $pagina = $_GET['pagina'];
    global $pdo;
        
    $sql = $pdo->prepare("DELETE FROM tbhoras WHERE id_horas = :id_horas");
    $sql->bindParam(':id_horas', $id_horas);
    $sql->execute();

    header("Location: $pagina?removido=true");
    exit;


?>
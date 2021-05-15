<?php

session_start();

function login($email, $senha){
    global $pdo;

    $sql = "SELECT * FROM tbusuarios WHERE email = :email AND senha = :senha";
    $sql = $pdo->prepare($sql);
    $sql->bindValue("email", $email);
    $sql->bindValue("senha", $senha);
    $sql->execute();

    if($sql->rowCount() > 0){
        $dado = $sql->fetch();
        $nome = $dado['nome'];
        $id_usuario = $dado['id_usuario'];
        
        //inclui o nome do usuário na sessão
        $_SESSION["nome"] = $nome;
        $_SESSION["id_usuario"] = $id_usuario;
        
        header("Location: selecaoPerfil.php");
    }else{
        echo "<script type='text/javascript'>alert('dados incorretos');</script>";
        header("Location: home.html");
    }

}


if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){

    require 'conexao.php';

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    login($email, $senha);

} else{
    header("Location: home.html");
}

?>

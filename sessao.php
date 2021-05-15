<?php
    session_start();
    //inclui o nome do usuário na sessão

    switch ($_POST['perfil']) {
        case "trabalhador":
            $_SESSION["perfil"] = "Trabalhador";
            break;
        case "coord-curso":
            $_SESSION["perfil"] = "Coordenador de Curso";
            break;
        case "coord-nucleo":
            $_SESSION["perfil"] = "Coordenador do Núcleo Pedagógico";
            break;
    }
    header("Location: inserirAjusteTrabalhador.php");
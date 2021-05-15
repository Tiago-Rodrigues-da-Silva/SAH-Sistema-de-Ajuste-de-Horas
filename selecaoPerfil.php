<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema SAH - Seleção de Perfil</title>

    <link href="css/estilo.css" rel="stylesheet">

  </head>
  <body>

    <div class="area-trabalho">

      <div>
        <a href="home.html"><img src="imagens/logo.jpg"></a>
      </div>

      <div class="nome-usuario">
        <?php
          echo "<p id='p1'>Usuário: ".$_SESSION['nome']."</p>"
        ?>
        
      </div>

      <form name="perfil-usuario" action="sessao.php" method="POST">

        <div class="corpo-selecao-perfil">
          <div class="form-usuario">
            <p>Perfil de Usuário</p>
            <select name="perfil" onChange="update()">
              <option value="trabalhador">Trabalhador</option>
              <option value="coord-curso">Coordenador de Curso</option>
              <option value="coord-nucleo">Coordenador do Núcleo Pedagógico</option>
            </select>




  
          </div>
          
          <button id="btn-perfil" class="btn-usuario">Acessar</button> 
        </div>

      </form>
    </div>
  </body>
</html>
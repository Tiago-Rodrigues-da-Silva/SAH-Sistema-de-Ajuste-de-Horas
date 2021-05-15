<?php
  session_start();  
  require 'gerarLista.php';

  if(isset($_GET['removido'])){
    $removido = $_GET['removido'];
    echo "<script>
            if($removido){
              alert('Registro excluído com sucesso!');
            }
          </script>";
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema SAH - Editar Ajuste de Trabalhador</title>
 
    <link href="css/estilo.css" rel="stylesheet">
    <script type="text/javascript" src="js/validacao.js"></script>

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
        
        <?php
          echo "<p id='p2'>Perfil: ".$_SESSION['perfil']."</p>"
        ?>
      </div>

      <div>
        <table id="table-menu">
          <tr><td><a href="inserirAjusteTrabalhador.php">Inserir</a></td></tr>
          <tr><td><a href="editarAjusteTrabalhador.php">Editar</a></td></tr>
          <tr><td><a href="visualizarAjusteTrabalhador.php">Visualizar</a></td></tr>
        </table>
      </div>


      <div class="corpo-ajuste">
        <form id="consulta" name="consulta" action="editarAjusteTrabalhador.php" method="POST" onsubmit="return valida_camposConsulta(this)">
          <div class="cabecalho">
          <p>Consulta</p>
            <div>
              <label>Data Início:</label><br>
              <input type="text" id="dataInicio" name="dataInicio" placeholder="DD/MM/2021" required onkeyup="mascaraData(this, this.value)" maxlength="10"/>  
            </div>
            
            <div>
              <label>Data Final:</label><br>
              <input type="text" id="dataFinal" name="dataFinal" placeholder="DD/MM/2021" required onkeyup="mascaraData(this, this.value)" maxlength="10"/>  
            </div>
            
            <div>
            <label for="justificativa">Justificativa</label>
              <select id="justificativa" name="justificativa">
                <option value="prodConteudo">Prod. Conteúdo</option>
                <option value="versionamento">Versionamento</option>
                <option value="capacitacao">Capacitação</option>
                <option value="emprestimo">Empréstimo</option>
              </select>
            </div>

            <button type="submit">Consulta</button>
           
          </div>

        </form>
        

             
        <p class="p-lista">Lista de horas</p>
        <div class="lista">
          <?php
            lista("editarAjusteTrabalhador.php");
          ?>          
        </div>

        <div class="rodape">
          <h4>Legenda:</h4>
          <div>
            <img src="imagens/edite.png">
            <p>Editar</p>
            <img src="imagens/delete.png">
            <p>Excluir</p>
          </div>

          <button class="btn-usuario">Enviar para Análise</button>
          <button class="btn-usuario">Voltar</button>

        </div>
          
      </div>

    </div>


  </body>
</html>
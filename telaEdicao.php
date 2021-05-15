
<?php
  session_start();
  require 'conexao.php';
  require 'Utilitarios.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema SAH - Edição de dados</title>
 
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


      <div class="corpo-ajuste">               
          <div class="cabecalho">
                <?php
                  //1º recebe os dados atuais conforme o id_horas que se quer atualizar   


        
                  $pesquisa = $_SESSION['id_usuario'];
                  $id_horas = $_GET['id_horas'];
                
                  global $pdo;

                  $sql = "SELECT * FROM tbhoras WHERE id_horas = '$id_horas'";

                  $sql = $pdo->prepare($sql);
                  $sql->execute();

                  while ($registro = $sql->fetch(PDO::FETCH_ASSOC))
                  {    
                    $id_horas = ($registro['id_horas']);
                    $data= toDateBrasil($registro['data']);
                    $entrada = toHHMM($registro['entrada']);
                    $saida = toHHMM($registro['saida']);
                    $justificativa = $registro['justificativa'];

                  }

                ?>


            <p>Editar</p>
            <form id="insere" name="insere" action="editarHoras.php" method="POST" onsubmit="return valida_camposInsere(this)"> 

              <input type='hidden' id = "id_horas" name="id_horas" value=<?php echo $id_horas?>>

              <div>
                <label>Data:</label><br>
                <input type="text" id="data" name="data" value=<?php echo $data?> required onkeyup="mascaraData(this, this.value)" maxlength="10"/>  
              </div>

              <div>
                <label>Hora Entrada:</label><br>
                <input type="text" id="horaEntrada" name="horaEntrada" value=<?php echo $entrada?> required onkeyup="mascaraHora(this, this.value)" maxlength="5"/>  
              </div>

              <div>
                <label>Hora Saída:</label><br>
                <input type="text" id="horaSaida" name="horaSaida" value=<?php echo $saida?> required onkeyup="mascaraHora(this, this.value)" maxlength="5"/>  
              </div>

              <div>
                <label for="justificativa">Justificativa</label>
                <select id="justificativa" name="justificativa">       
                  <option value="prodConteudo" <?php if($justificativa == 'prodConteudo'){echo("selected");}?>>Prod. Conteúdo</option>
                  <option value="versionamento" <?php if($justificativa == 'versionamento'){echo("selected");}?>>Versionamento</option>
                  <option value="capacitacao" <?php if($justificativa == 'capacitacao'){echo("selected");}?>>Capacitação</option>
                  <option value="emprestimo" <?php if($justificativa == 'emprestimo'){echo("selected");}?>>Empréstimo</option>
                </select>
              </div>
              <button type="submit" onClick="return confirm('Deseja atualizar o registro?');">Salvar alterações</button>

              </form>
          </div>             
      </div>
    </div>
  </body>
</html>





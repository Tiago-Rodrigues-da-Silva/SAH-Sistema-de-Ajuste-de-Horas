<?php

function lista($pagina){
  require 'conexao.php';
  require 'Utilitarios.php';
  
  
  $pesquisa = $_SESSION['id_usuario'];

  global $pdo;

  //se inputs de pesquisa estiverem preenchidos, faz select conforme a pesquisa, caso contrário
  //faz a pesquisa de todos os registros (como na abertura da página)
  
  if (isset($_POST['dataInicio']) && isset($_POST['dataFinal']) && isset($_POST['justificativa'])){
    $dataInicial = toDateSql($_POST['dataInicio']);
    $dataFinal = toDateSql($_POST['dataFinal']);
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
    
    $sql = "SELECT * FROM tbhoras WHERE id_usuario = '$pesquisa' and justificativa = '$justificativa'
      and data between '$dataInicial' and '$dataFinal' ORDER BY data ASC";

  } else{
    $sql = "SELECT * FROM tbhoras WHERE id_usuario = '$pesquisa' ORDER BY data ASC";
  }
    $sql = $pdo->prepare($sql);
    $sql->execute();

    //Criando tabela e cabeçalho de dados
    echo "<table id = 'table-lista-horas'>";
    echo "<tr>";
    echo "<th>Data</th>";
    echo "<th>Hora Entrada</th>";
    echo "<th>Hora Saída</th>";
    echo "<th>Total Horas</th>";
    echo "<th>Justificativa</th>";

    if($pagina != "visualizarAjusteTrabalhador.php"){
      echo "<th>Opções</th>";
      }
    echo "</tr>";
    
    $total = 0;
    // Obtendo os dados por meio de um loop while
    while ($registro = $sql->fetch(PDO::FETCH_ASSOC))
      {    
        $id_horas = ($registro['id_horas']);
        $data= toDateBrasil($registro['data']);
        $entrada = toHHMM($registro['entrada']);
        $saida = toHHMM($registro['saida']);
        $justificativa = $registro['justificativa'];
    
        $diferenca = ((strtotime($saida) - strtotime($entrada)))/60/60;
        $total += $diferenca;

        echo "<input type='hidden' id = id_horas value=".$id_horas."/>";
        echo "<tr>";
        echo "<td>".$data."</td>";
        echo "<td>".$entrada."</td>";
        echo "<td>".$saida."</td>";
        echo "<td>".$diferenca."</td>";
        echo "<td>".$justificativa."</td>";

        if($pagina != "visualizarAjusteTrabalhador.php"){
          echo "<td>";
          echo "<div class='btn-legenda'>";
          echo "<a href='telaEdicao.php?id_horas=".$id_horas."->id_horas&pagina=".$pagina."'><img src='imagens/edite.png'></a>";
          echo "<a href='excluirHoras.php?id_horas=".$id_horas."->id_horas&pagina=".$pagina."'><img src='imagens/delete.png'></a>";
          echo "</div>";
          echo "</td>";
        }
        echo "</tr>";
        }

        if($pagina != "visualizarAjusteTrabalhador.php"){
          echo "<tr><td></td><td></td><td></td><td>".$total."</td><td></td><td></td></tr>";
        } else{
          echo "<tr><td></td><td></td><td></td><td>".$total."</td><td></td></tr>";
        }
        echo "</table>";   
      }
?>
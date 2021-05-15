<?php

    function stringToDateTimeSQL($data,$hora){

        $ano = substr($data, 6, 4);
        $mes = substr($data, 3, 2);
        $dia = substr($data, 0, 2);
        $horas = substr($hora, 0, 2);
        $minutos = substr($hora, 3, 2);
        $segundos = "00";
      
        $formatoDateTimeSQL  = $ano;
        $formatoDateTimeSQL .= "-";
        $formatoDateTimeSQL .= $mes;
        $formatoDateTimeSQL .= "-";
        $formatoDateTimeSQL .= $dia;
      
        $formatoDateTimeSQL .= " ";
      
        $formatoDateTimeSQL .= $horas;
        $formatoDateTimeSQL .= ":";
        $formatoDateTimeSQL .= $minutos;
        $formatoDateTimeSQL .= ":";
        $formatoDateTimeSQL .= $segundos;
      
        return $formatoDateTimeSQL;
    }

    function toDateSql($data){
        $ano = substr($data, 6, 4);
        $mes = substr($data, 3, 2);
        $dia = substr($data, 0, 2);

        $formatoDateSQL  = $ano;
        $formatoDateSQL .= "-";
        $formatoDateSQL .= $mes;
        $formatoDateSQL .= "-";
        $formatoDateSQL .= $dia;

        return $formatoDateSQL;
    }

    function toDateBrasil($data){
        $ano = substr($data, 0, 4);
        $mes = substr($data, 5, 2);
        $dia = substr($data, 8, 2);

        $formatoDateBrasil  = $dia;
        $formatoDateBrasil .= "/";
        $formatoDateBrasil .= $mes;
        $formatoDateBrasil .= "/";
        $formatoDateBrasil .= $ano;

        return $formatoDateBrasil;
    }

    function toHHMM($hora){
        $horas = substr($hora, 0, 2);
        $minutos = substr($hora, 3, 2);
        $formatoToHHMM = $horas;
        $formatoToHHMM .= ":";
        $formatoToHHMM .= $minutos;

        return $formatoToHHMM;
    }
    





?>
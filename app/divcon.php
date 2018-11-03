<?php
	echo "<table id=\"tabela\"><tr id=\"cabecalho\">";
    echo "<th>Contrato/Ata/Processo</th>";
    echo "<th>Objeto</th>";
    echo "<th>Requisitante</th>";
    echo "<th>Andamento</th>";
    echo "<th>Empresa</th>";
    echo "<th>Responsavel</th>";
    echo "</tr>";
    
    foreach ($Spreadsheet as $Key => $Row) {
        if ($Row && $Key > 3 && strlen($Row[7]) != 0) {
            echo "<tr class =\"processos\">";
            echo      "<td class=\"processo1\">"; print_r($Row[3]);
            echo "</td><td class=\"processo3\">"; print_r($Row[2]);
            echo "</td><td class=\"processo6\">"; print_r($Row[4]);
            echo "</td><td class=\"processo4\"><strong> OBJETIVO: </strong>";
                print_r($Row[5]);
                echo "<strong>. FASE ATUAL: </strong>";
                print_r($Row[7]);
                        echo "<div class=\"bar-pale-red\">";
                echo "<div class=\"bar-green bar-center\" style=\"width:";
                print_r($Row[9]);
                echo "\"><strong>";
                print_r($Row[9]);
                echo"</strong></div>";
                        echo "</div>";
                echo "<br><strong>Andamentos: </strong><br>";
                print_r($Row[6]);
            echo "</td><td class=\"processo5\">"; print_r($Row[1]);
            echo "</td><td class=\"processo2\">"; print_r($Row[0]);
            echo "</td></tr>";
        }
    }
   echo "</table>";
?>
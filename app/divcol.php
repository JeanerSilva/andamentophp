<?php 
     echo "<div class='titulo'>TRÂMITE NA DIVCON</div>";
    echo "<table class='tabela' id='tabela'><tr id='cabecalho'>";
    echo "<th>Processo</th>";
    echo "<th>Andamento</th>";
    echo "<th>Requisitante</th>";
    echo "<th>Objeto</th>";
    echo "<th>Nº </th>";
    echo "<th>Responsável</th>";
    echo "</tr>";

    foreach ($SpreadsheetDivcol as $Key => $Row) {
        if ($Row && $Key > 3) {
            echo "<tr class ='processos'>";
            echo "     <td class='processo1'>"; print_r($Row[1]); //processo            
            echo "</td><td class='processo4'>"; //Andamento
            echo "MODALIDADE: <strong>"; print_r($Row[4]);
            echo "</strong>. FASE ATUAL: <strong>"; print_r($Row[7]);echo "</strong>";
                if (strcasecmp($Row[7], "Envio à DIVCON") == 0) {
                    echo "<button class='btn-small' onclick='";
                    echo "window.location = 'indexphp.php?filtro="
                    . $Row[1] . "&tabela=divcon'";
                    echo "' id='divcon'>Abrir na DIVCON</button>";
                }
                echo "<div class='bar-pale-red'>";
                echo "<div class='bar-green bar-center' style='width:";
                print_r($Row[9]);
                echo "'><strong>";
                print_r($Row[9]);
                echo"</strong></div>";
                        echo "</div>";
                echo "<br><strong>Histórico: </strong><br>";
                print_r($Row[6]);            
            echo "</td><td class='processo3'>"; print_r($Row[3]); //Requisitante
            echo "</td><td class='processo2'>"; print_r($Row[2]); //objeto
            echo "</td><td class='processo6'>"; print_r($Row[5]); //numero
            echo "</td><td class='processo5'>"; print_r($Row[0]); //responsável
            echo "</td></tr>";
        }	
    }
    echo "</table>";
?>
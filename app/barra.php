<?php
    echo "<td><div class='bar-pale-red' style='position: relative;' >"; 
        echo "<div class='bar-green bar-center' style='margin-left: 5%; position: absolute; width:";
            print_r($Percentual); echo "%'></div>";
        
            echo "<div class='bar-fase bar-center' style='width: $W%; margin-left:"; print_r($P[0]); echo "%'>$A1</div>";
            echo "<div class='bar-fase bar-center' style='width: $W%; margin-left:"; print_r($P[1]); echo "%'>$A2</div>";
            echo "<div class='bar-fase bar-center' style='width: $W%; margin-left:"; print_r($P[2]); echo "%'>$A3</div>";
            echo "<div class='bar-fase bar-center' style='width: $W%; margin-left:"; print_r($P[3]); echo "%'>$A4</div>";
            echo "<div class='bar-fase bar-center' style='width: $W%; margin-left:"; print_r($P[4]); echo "%'>$A5</div>";
            echo "<div class='bar-fase bar-center' style='width: $W%; margin-left:"; print_r($P[5]); echo "%'>$A6</div>";
            echo "<div class='bar-fase bar-center' style='width: $W%; margin-left:"; print_r($P[6]); echo "%'>$A7</div>";
            echo "<div class='bar-fase bar-center' style='width: $W%; margin-left:"; print_r($P[7]); echo "%'>$A8</div>";
            echo "<div class='bar-fase bar-center' style='width: $W%; margin-left:"; print_r($P[8]); echo "%'>$A9</div>";
            echo "<div class='bar-fase bar-center' style='width: $W%; margin-left:"; print_r($P[9]); echo "%'>$A10</div>";

    echo "<br></div></td>"; 

?>
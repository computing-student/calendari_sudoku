<!DOCTYPE html>
<html>
<!-- Aquí defineixo el tipus de codificació, així com el títol-->
<head>
    <meta charset="utf-8">
    <title>Sudoku</title>
    <style>
        table {
            width: 65%;
        }
        .base {
            border-bottom: 1px solid black;
            border-right: 1px solid black;
        }

        .dreta {
            border-right: 4px solid black;
        }

        .sota {
            border-bottom: 4px solid black;
        }

        input {
            width: 30%;
        }
    </style>
</head>

<!-- Aquí van els continguts de la web -->
<body>
	<!-- Informo del nom de l'aplicació, així com del nom del mes -->
    <h1>Sudoku</h1><br>

    <!-- Taula on va el calendari -->
    <table>
        
        <?php


            // Funció que desordena la matriu preservant les claus.
            function shuffle_assoc($list) { 
              if (!is_array($list)) return $list; 

              $keys = array_keys($list); 
              shuffle($keys); 
              $random = array(); 
              foreach ($keys as $key) { 
                $random[$key] = $list[$key]; 
              }
              return $random; 
            } 

            // Variable que conté la matriu.
            $caselles = [[]];

            // Variable que conté els nombres a emplenar.
            $listaNumeros = [];
            for($i=0; $i < 20; $i++) {
                $listaNumeros[$i] = rand(1, 9);
            };

            // Empleno la matriu.
            $cont = 0;
            for ($i=0; $i<9; $i++) {
                for ($j=0; $j<9; $j++) {
                    if ($cont < 20) {
                        $caselles[$i][$j] = $listaNumeros[$cont];
                        $cont += 1;
                    } else {
                        $caselles[$i][$j] = "empty";
                    }
                };
            };
        
            // Desordeno la matriu.
            $casellesDesordenades = shuffle_assoc($caselles);
            $nombreFila = 0;

            // Imprimeixo la taula.
            foreach ($casellesDesordenades as $fila) {
                    echo '<tr>';
                    // Aquí hi ha d'haver desplegables tipus select amb opcions de l'1 al 9.
                    foreach ($fila as $celda => $valor) {
                        if($valor == "empty"  && $celda != 2 && $celda != 5 && $nombreFila != 2 && $nombreFila != 5) {
                            echo '<th class="base"><input type="number" min="1" max="9" step="1"></input></th>';
                        } else if ($valor == "empty" && $nombreFila != 2 && $nombreFila != 5 && ($celda == 2 || $celda == 5)){
                            echo '<th class="base dreta"><input type="number" min="1" max="9" step="1"></input></th>';
                        } else if ($valor == "empty" && $celda != 2 && $celda != 5 && ($nombreFila == 2 || $nombreFila == 5)) {
                            echo '<th class="base sota"><input type="number" min="1" max="9" step="1"></input></th>';
                        } else if ($valor == "empty" && ($celda == 2 || $celda == 5) && ($celda == 2 || $celda == 5)) {
                            echo '<th class="base dreta sota"><input type="number" min="1" max="9" step="1"></input></th>';
                        } else if($celda != 2 && $celda != 5 && $nombreFila != 2 && $nombreFila != 5) {
                            echo '<th class="base">';
                            echo "$valor</th>";
                        } else if ($nombreFila != 2 && $nombreFila != 5 && ($celda == 2 || $celda == 5)){
                            echo '<th class="base dreta">';
                            echo "$valor</th>";
                        } else if ($celda != 2 && $celda != 5 && ($nombreFila == 2 || $nombreFila == 5)) {
                            echo '<th class="base sota">';
                            echo "$valor</th>";
                        } else if (($celda == 2 || $celda == 5) && ($nombreFila == 2 || $nombreFila == 5)) {
                            echo '<th class="base dreta sota">';
                            echo "$valor</th>";
                        } 
                    };
                    echo '</tr>';   
                    $nombreFila += 1;
            };
        ?>

    </table>
</body>
</html>